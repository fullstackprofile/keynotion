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
use App\Notifications\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        $order = Order::create($request->validated());
        $order->order_items()->create([
            'order_id' => $order->id,
            'ticket_id' => $request->ticket_id,
            'ticket_title' => $request->ticket_title,
            'quantity' => $request->quantity,
            'currency' => $request->currency,
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
            'vat_number' => $request->vat_number,
        ]);
        $order->delegaters()->create([
            'order_id' => $order->id,
            'full_name' => $request->full_name,
            'job_title' => $request->job_title,
            'email' => $request->email,
        ]);


        $user = $order->company;


        $user->notify(new OrderNotification($order));
        return response($order, 201);
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
