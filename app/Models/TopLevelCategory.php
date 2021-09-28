<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class TopLevelCategory extends Model
{
    use HasFactory;

    public function getLogoUrlAttribute()
    {
        return Storage::url($this->image);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'top_level_category_id', 'id');
    }
}
