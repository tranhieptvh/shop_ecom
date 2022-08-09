<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';

    use SoftDeletes;

    protected $fillable = [
        'name','slug', 'parent_id', 'ordering',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
