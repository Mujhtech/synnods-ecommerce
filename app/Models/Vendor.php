<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Vendor extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getStoreLogoUrlAttribute()
    {
        return $this->store_logo ? Storage::url($this->store_logo) : 'https://ui-avatars.com/api/?name='.urlencode($this->store_name).'&color=7F9CF5&background=EBF4FF';
    }
}
