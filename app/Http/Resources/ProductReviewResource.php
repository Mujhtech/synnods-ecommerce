<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewResource extends JsonResource
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
            'name' => $this->user_id ? $this->user->full_name : $this->name,
            'email' => $this->user_id ? $this->user->email : $this->email,
            'rating' => $this->rating,
            'contents' => $this->contents,
            'product_name' => $this->product->name,
            'product_slug' => $this->product->slug,
            'added_at' => $this->created_at->diffForHumans()
        ];
    }
}
