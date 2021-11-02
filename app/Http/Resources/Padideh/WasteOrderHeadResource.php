<?php

namespace App\Http\Resources\Padideh;

use Illuminate\Http\Resources\Json\JsonResource;

class WasteOrderHeadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'code' => $this->code,
            'driver_id' => $this->driver_id,
            'status_id' => $this->status_id,
            'admin_id' => $this->admin_id,
            'delivery_date' => $this->delivery_date,
            'orderItem' => WasteOrderResource::collection($this->waste_orders)
        ];
    }
}
