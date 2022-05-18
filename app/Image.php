<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'path', 'status',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
