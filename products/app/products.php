<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'name',
        'amount_instock',
        'cprice',
        'sprice',
        'qty',
        'expdate',
        'user_id',
        'supplier_certificate'
    ];
}
