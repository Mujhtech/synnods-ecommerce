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
            'vendor_id' => VendorResource::make($this->vendor),
            'category' => CategoryResource::make($this->category),
            'sub_category' => SubCategoryResource::make($this->sub_category),
            'brand' => ProductBrandResource::make($this->brand),
            'reviews' => ProductReviewResource::collection($this->reviews),
            'name' => $this->name,
            'description' => $this->description,
            'contents' => $this->contents,
            'notes' => $this->notes,
            'featured_image' => $this->featured_image_url,
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
