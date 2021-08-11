<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Product extends Model
{
    use HasFactory;

    public function getFeaturedImageUrlAttribute()
    {
        return Storage::url($this->featured_image);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'product_brand_id', 'id');
    }

    public function label()
    {
        return $this->belongsTo(ProductLabel::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }
}
