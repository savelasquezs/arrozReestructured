<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "customer" => ["id" => $this->customer->id, "name" => $this->customer->name, "phones" => $this->customer->phones],
            "order_status" => $this->order_status->name,
            "delivery_person" => !empty($this->delivery_person) ? ["name" => $this->delivery_person->name, "id" => $this->delivery_person->id] : "",
            "delivery_method" => $this->delivery_method->name,
            "gift" => $this->gift,
            "order_items" => OrderItemResource::collection($this->order_items),
            "description" => $this->description,
            "discount" => $this->discount,
            "time_delivered" => $this->time_delivered,
            "time_cooked" => $this->time_cooked,
            "time_on_table" => $this->time_on_table,
            "amount_to_collect" => $this->amount_to_collect,
            "total" => $this->total,
            "delivery_address" => $this->delivery_address,
            "created_at" => $this->created_at,
        ];
    }
}
