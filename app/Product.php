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
        'is_feature',
        'feature_time',
        'volume',
        'concentration',
    ];

    const SEARCH_PARAMS_PRICE = [
        'duoi-1trieu' => [
            'title' => 'Dưới 1 triệu',
            'value' => 1000000
        ],
        '1trieu-5trieu' => [
            'title' => '1 triệu - 5 triệu',
            'value' => [1000000, 5000000]
        ],
        '5trieu-10trieu' => [
            'title' => '5 triệu - 10 triệu',
            'value' => [5000000, 10000000]
        ],
        'tren-10trieu' => [
            'title' => 'Trên 10 triệu',
            'value' => 10000000
        ]
    ];

    const SEARCH_PARAMS_VOLUME = [
        'duoi-500' => [
            'title' => 'Dưới 500 ml',
            'value' => 500
        ],
        '500-1000' => [
            'title' => '500 ml - 1000 ml',
            'value' => [500, 1000]
        ],
        'tren-1000' => [
            'title' => 'Trên 1000 ml',
            'value' => 1000
        ],
    ];

    const SEARCH_PARAMS_CONCENTRATION = [
        'duoi-10' => [
            'title' => 'Dưới 10%',
            'value' => 10
        ],
        '10-40' => [
            'title' => '10% - 40%',
            'value' => [10, 40]
        ],
        '40-50' => [
            'title' => '40% - 50%',
            'value' => [40, 50]
        ],
        'tren-50' => [
            'title' => 'Trên 50%',
            'value' => 50
        ],
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
