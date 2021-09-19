<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
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
            'code' => $this->code,
            'amount' => $this->total_price,
            'type' => $this->type,
            'expired' => $this->expired ? true : false,
            'start' => $this->start_date->diffForHumans(),
            'end' => $this->expiry_date->diffForHumans(),
        ];
    }
}
