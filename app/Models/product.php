<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function ProductImageGalleries()
    {
        return $this->hasMany(productImageGallery::class);
    }

    public function productsize(){
        return $this->hasMany(ProductVariantItem::class);
    }

    public function productoption()
    {
        return $this->hasMany(ProductOption::class);
    }
}
