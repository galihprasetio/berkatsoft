<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSO extends Model
{
    //
    protected $table = 'detail_so';
    protected $fillable = [
        'so_code',
        'id_product',
        'qty',
    ];
}
