<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'state' => $this->state,
            'city' => $this->city,
            'amount' => $this->price,
            'country' => $this->country,
            'type' => $this->type,
            'status' => $this->status ? true : false,
        ];
    }
}
