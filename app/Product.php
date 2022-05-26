<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'content',
        'category_id',
        'brand_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function getMainImage() {
        return $this->productImages()->where('type', 0);
    }

    public function getThumbnailImage() {
        return $this->productImages()->where('type', 1);
    }
}
