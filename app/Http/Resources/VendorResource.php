<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
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
            'name' => $this->store_name,
            'description' => $this->store_description,
            'email' => $this->store_email,
            'phone' => $this->store_phone,
            'logo' => $this->store_logo,
            'url' => $this->store_url,
            'address' => $this->store_address,
            'state' => $this->store_state,
            'city' => $this->store_city,
            'country' => $this->store_country,
            'slug' => $this->store_slug
        ];
    }
}
