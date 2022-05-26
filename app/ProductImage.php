<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'path',
        'type',
        'product_id',
    ];

    const MAIN = 0;
    const THUMBNAIL = 1;

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
