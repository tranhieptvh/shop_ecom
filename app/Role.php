<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
    ];

    const ROLE = [
        'ROOT' => 1,
        'ADMIN' => 2,
        'MEMBER' => 3,
    ];

    public function users() {
        return $this->hasMany('App\User');
    }
}
