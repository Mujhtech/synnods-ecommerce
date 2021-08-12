<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class ProductImage extends Model
{
    use HasFactory;

    public function getUrlPathAttribute()
    {
        return $this->url ? Storage::url($this->url) : null;
    }
}
