<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\BillingAddress\UpdateBillingAddressRequest;
use App\Http\Requests\Api\Order\OrderStoreRequest;
use App\Http\Resources\BillingAddress\BillingAddressResource;
use App\Http\Resources\Order\OrderDetailsResource;
use App\Http\Resources\Order\OrderOneResource;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\ticket;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\ReceiveNotification;
use App\Services\Order\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OrderController extends BaseController
{
    public function getKeys()
    {
        return $this->render([
            'p_k' => config('cashier.key')
        ]);
    }

    public function thankYou()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStoreRequest $request
     * @return Response
     */
    public function store(OrderStoreRequest $request): Response
    {
        $data = $request->validated();
        $subTotal = 0;
        $vat = 0;

        collect(is_array($request->order_items) ? $request->order_items : [])
            ->each(function ($orderItems) use (&$subTotal) {
                $ticket = ticket::whereId($orderItems['ticket_id'])->with('event')->first();
                $subTotal += $ticket->price * $orderItems['quantity'];
            });

        $total = ($subTotal + $vat);

        if ($request->has('coupon')) {
            $coupon = Coupon::where('code', $request->coupon)->first();
            if ($coupon) {
                if ($coupon->percent_amount === '%') {
                    $discountTotal = ($total * $coupon->discount) / 100;
                } else {
                    $discountTotal = $coupon->discount;
                }
                $total = ($discountTotal > $total || $discountTotal < 0) ? 0 : $total - $discountTotal;
            }
        }

        $data['subtotal'] = $subTotal;
        $data['total'] = $total;
        $data['vat'] = $vat;
        $data['user_id'] = $this->getUser()->id;

        $order = Order::create($data);

        if ($order->status == null) $order->status = "Processing";
        if ($request->has('user_id')) $order->user_id = $request->user_id;

        $order->company()->create([
            'order_id' => $order->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'country_region' => $request->country_region,
            'street_address' => $request->street_address,
            'town_city' => $request->town_city,
            'postcode_zip' => $request->postcode_zip,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        collect(is_array($request->order_items) ? $request->order_items : [])
            ->each(function ($orderItems) use ($order) {
                /** @var ticket $ticket */
                $ticket = ticket::whereId($orderItems['ticket_id'])->with('event')->first();
                if ($ticket && $ticket->event) {
                    $order->order_items()->create([
                        'order_id' => $order->id,
                        'ticket_id' => $ticket->id,
                        'ticket_title' => $ticket->event->title,
                        'quantity' => $orderItems['quantity'],
                        'price' => $ticket->sale ?? $ticket->price,
                    ]);
                }
            });

        collect(is_array($request->delegaters) ? $request->delegaters : [])
            ->each(function ($delegaters) use ($order) {
                /** @var ticket $ticket */
                $ticket = ticket::whereId($delegaters['ticket_id'])->with('event')->first();
                $order->delegaters()->create([
                    'order_id' => $order->id,
                    'ticket_id' => $ticket->id,
                    'full_name' => $delegaters['full_name'],
                    'job_title' => $delegaters['job_title'],
                    'email' => $delegaters['email'],
                ]);
            });


        $status = (new CheckoutService())->make($order, $this->getUser(), $order->gateway_id, $request->payment_method_id)->pay()->redirect();

        if ($status !== false) {
            return $this->render(null, [
                'redirect' => $status
            ], ResponseAlias::HTTP_CREATED);
        }

        $user = $order->company;
        $user->notify(new OrderNotification($order));


        /** @var User $admin */

        $admin = User::where('email', 'Registration@key-notion.com')->get()->each(function (User $user) use ($order) {
            $user->notify(new ReceiveNotification($order));
        });

        return $this->render(new OrderOneResource($order), [], ResponseAlias::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @param Order $order
     * @return mixed
     */
    public function show(Request $request, Order $order): mixed
    {
        return $this->render(new OrderOneResource($order));
    }


    /**
     * @param Request $request
     * @return mixed
     */

    public function billingAddress(Request $request)
    {
        return $this->render(
            BillingAddressResource::collection(Order::query()
                ->when(
                    $request->has('user_id'), fn($builder) => $builder->where('user_id', '=', $request->user_id)
                )
                ->get()
            )
        );
    }

    /**
     * @param Request $request
     * @return mixed
     */

    public function orderDetails(Request $request)
    {
        return $this->render(
            OrderDetailsResource::collection(Order::query()
                ->when(
                    $request->has('user_id'), fn($builder) => $builder->where('user_id', '=', $request->user_id)
                )
                ->get()
            )
        );
    }

    /**
     * @param UpdateBillingAddressRequest $request
     * @return mixed
     */

    public function updateBilling(Request $request): mixed
    {
        $order = Order::where('user_id', $request->user_id)->with('company')->first();

        $order->company->update($request->all());

        return $this->render(new BillingAddressResource($order));
    }
}
