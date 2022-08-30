<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Order\OrderStoreRequest;
use App\Http\Resources\Order\OrderOneResource;
use App\Models\Order;
use App\Models\ticket;
use App\Models\type;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\ReceiveNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function store(OrderStoreRequest $request): Response
    {
        $order = Order::create($request->validated());
        if ($order->status == null) $order->status= "Processing";

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
                        'price' => $ticket->price,
                    ]);
                }
            });

        collect(is_array($request->delegaters) ? $request->delegaters : [])
            ->each(function ($delegaters) use ($order) {
                /** @var ticket $ticket */
                    $ticket = ticket::whereId($delegaters['ticket_id'])->with('event')->first();
                    $order->delegaters()->create([
                        'order_id' => $order->id,
                        'ticket_id'=>$ticket->id,
                        'full_name' => $delegaters['full_name'],
                        'job_title' =>  $delegaters['job_title'],
                        'email' => $delegaters['email'],
                    ]);
                });


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



}
