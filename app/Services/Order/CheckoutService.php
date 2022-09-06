<?php

namespace App\Services\Order;

use App\Gateways\BaseGateway;
use App\Models\Gateway;
use App\Models\Order;
use App\Models\OrderChild;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;

class CheckoutService
{
    protected User $user;

    /**
     * @var ?BaseGateway
     */
    protected ?BaseGateway $gateway;

    protected Builder|Order $order;

    /**
     * @param Order $order
     * @param User $user
     * @param int $gatewayId
     * @param string|null $stripePaymentMethodId
     * @return $this
     */
    public function make(Order $order, User $user, int $gatewayId, ?string $stripePaymentMethodId = null): static
    {
        $this->user = $user;

        $this->makeGatewayClass(
            $order,
            $gatewayId,
            $stripePaymentMethodId
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
     * @return mixed
     */
    public function redirect(): mixed
    {
        return $this->gateway->redirectAfterPay();
    }

    /**
     * @param Order $order
     * @param $gatewayId
     * @param $paymentCardId
     * @return void
     */
    private function makeGatewayClass(Order $order, $gatewayId, $paymentCardId = null): void
    {
        /** @var Gateway $gateway */
        $gateway = Gateway::whereId($gatewayId)->first();
        if ($gateway) {
            $this->gateway = $gateway->makeInstanceClass($this->user)->setOrder($order);
            if ($gateway->type == Gateway::TYPE_CC) {
                $this->gateway->setPaymentCard($paymentCardId);
            }
        }
    }
}
