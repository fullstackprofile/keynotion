<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Order\OrderStoreRequest;
use App\Http\Resources\News\NewsOneResource;
use App\Http\Resources\Order\OrderOneResource;
use App\Models\news;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\ReceiveNotification;
use App\Notifications\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStoreRequest $request
     * @return Response
     */
    public function store(OrderStoreRequest $request):Response
    {
        $order = Order::create($request->validated());
        $order->order_items()->create([
            'order_id' => $order->id,
            'ticket_id' => $request->ticket_id,
            'ticket_title' => $request->ticket_title,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
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
        $order->delegaters()->create([
            'order_id' => $order->id,
            'full_name' => $request->full_name,
            'job_title' => $request->job_title,
            'email' => $request->email,
        ]);


        $user = $order->company;
        $user->notify(new OrderNotification($order));


        /** @var User $admin */

        $admin = User::where('email','Registration@key-notion.com')->get()->each(function (User $user) use ($order) {
            $user->notify( new ReceiveNotification($order));
        });

        return $this->render(new OrderOneResource($order),[], ResponseAlias::HTTP_CREATED);
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
}
