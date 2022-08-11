<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'infos';

    protected $fillable = [
        'phone', 'address', 'email', 'zalo_qr', 'bank', 'bank_qr', 'vat', 'ship_fee'
    ];
}
