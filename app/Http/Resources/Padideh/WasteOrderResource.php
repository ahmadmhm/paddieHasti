<?php

namespace App\Http\Resources\Padideh;

use Illuminate\Http\Resources\Json\JsonResource;

class WasteOrderResource extends JsonResource
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
            'pasmand_id' => $this->pasmand_id,
            'name' => $this->name,
            'vahed' => $this->vahed,
            'weight' => $this->weight,
            'price' => $this->price,
        ];

    }
}
