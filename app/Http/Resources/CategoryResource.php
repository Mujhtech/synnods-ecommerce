<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'description' => $this->description,
            'icon' => $this->icon,
            'image' => $this->image ? $this->logo_url : null,
            'slug' => $this->slug,
            'status' => $this->status,
            'top_level_category_id' => $this->top_level_category_id,
            'top_level_category' => TopLevelCategoryResource::make($this->top_level),
            'sub_categories' => SubCategoryResource::collection($this->sub_categories),
        ];
    }
}
