<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderSO extends Model
{
    //
    protected $table = 'header_so';
    protected $fillable = [
       'so_code',
       'id_customer',
       'posting_date',
       'delivery_date',
       'status',
       'tax',
       'shipment',
       'total_payment',
    ];
}
