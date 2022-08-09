<?php

namespace App\Services\Order;

use App\Gateways\BaseGateway;
use App\Http\Requests\API\Order\OrderCheckoutStoreRequest;
use App\Models\Gateway;
use App\Models\Order;
use App\Models\OrderChild;
use App\Models\ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class CheckoutService
{
    protected User $user;

    /**
     * @var ?BaseGateway
     */
    protected ?BaseGateway $gateway;

    protected Builder|Order $order;

    /**
     * @param  OrderCheckoutStoreRequest  $request
     * @param  User  $user
     * @return CheckoutService
     */
    public function make(OrderCheckoutStoreRequest $request, User $user)
    {
        $this->user = $user;
        $data = $request->validated();
        $order = $this->makeOrder($data['items']);

        $this->makeGatewayClass(
            $order,
            $data['gateway_id'],
            $data['payment_card_id'] ?? null
        );

        return $this;
    }

    /**
     * @return $this
     */
    public function pay(): static
    {
        $this->gateway->pay();

        return $this;
    }

    /**
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return redirect()->to($this->gateway->redirectAfterPay());
    }

    /**
     * @param  array  $items
     * @return Order|Builder
     */
    private function makeOrder(array $items): Order|Builder
    {
        $items = CartService::makeCart(collect($items));
        $order = Order::query()->create([
            'user_id' => $this->user->id,
        ]);
        $items->groupBy('restaurant_id')->each(function (Collection $data, $restaurantId) use ($order) {
            /** @var OrderChild $orderChild */
            $orderChild = OrderChild::create([
                'order_id' => $order->id,
                'restaurant_id' => $restaurantId,

            ]);
            $data->each(function (ticket $product) use ($orderChild, $order) {
                $price = ! empty($product->sale_price) ? $product->sale_price : $product->price;

                $orderChild->orderItems()->create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $product->quantity,
                    'unit_price' => $product->price,
                    'sale_price' => $product->sale_price,
                    'total_price' => $price * $product->quantity,
                ]);
            });
            $orderChild->updateQuietly(['total_price' => $orderChild->orderItems()->sum('total_price')]);
        });

        $sum = $order->orderChildren()->sum('total_price');

        $order->updateQuietly([
            'amount' => $sum,
        ]);

        return $order;
    }

    private function makeGatewayClass(Order $order, $gatewayId, $paymentCardId = null)
    {
        /** @var Gateway $gateway */
        $gateway = Gateway::whereId($gatewayId)->first();
        if ($gateway) {
            $this->gateway = $gateway->makeInstanceClass($this->user)->setOrder($order);
            if ($gateway->type == Gateway::TYPE_CC) {
                $this->gateway->setPaymentCard(
                    $this->user->paymentCards()->where('id', $paymentCardId)->first()
                );
            }
        }
    }
}
