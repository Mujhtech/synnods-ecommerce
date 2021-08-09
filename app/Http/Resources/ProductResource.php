<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'vendor_id' => $this->vendor_id,
            'category' => $this->category_id,
            'sub_category' => $this->sub_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'contents' => $this->contents,
            'notes' => $this->notes,
            'featured_image' => $this->featured_image,
            'images' => $this->images,
            'sku' => $this->sku,
            'slug' => $this->slug,
            'stock_status' => $this->stock_status,
            'quantity_in_stock' => $this->quantity_in_stock,
            'featured' => $this->featured ? true : false,
            'weight' => $this->weight,
            'tags' => $this->tags,
            'labels' => $this->labels,
            'price' => $this->price

        ];
    }
}
