<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductBrandResource extends JsonResource
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
            'name' => $this->name,
            'slug' => strtolower(str_replace(' ', '-', $this->name)),
            'status' => $this->status ? true : false,
            'image' => $this->image ? $this->logo_url : null,
        ];
    }
}
