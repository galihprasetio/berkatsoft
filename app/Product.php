<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name',
        'spec',
        'unit',
        'stock',
        'price',
        'diskon_price',
    ];
}
