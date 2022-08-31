<?php

namespace App\Http\Resources\Order;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ticket;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        $order_item=OrderItem::where('order_id',$this->id)->get();
//        $ticket = ticket::whereId($order_item['ticket_id'])->with('event')->first();
        
        return [
            'id'=>$this->id,
            'order_number'=>$this->order_number,
            'created_at'=>Carbon::parse(strtotime($this->created_at))->format('d F Y'),
            'status'=>$this->status,
            'total'=>$this->Total,
            'count'=>$order_item->SUM('quantity'),
            'order_items' => OrderItemResource::collection($this->order_items),
        ];
    }
}
