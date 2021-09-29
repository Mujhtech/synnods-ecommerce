<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Category extends Model
{
    use HasFactory;

    public function getLogoUrlAttribute()
    {
        return Storage::url($this->image);
    }

    public function top_level()
    {
        return $this->belongsTo(TopLevelCategory::class);
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
