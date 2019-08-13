<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_lib',
        'product_id',
        'number_products_needed',
        'shop',
        'discount',
        'minimum_basket_price',
        'expiration',
        'code',
        'used',
        'notify_me'
    ];

    protected $dates = [
        'expiration'
    ];
}
