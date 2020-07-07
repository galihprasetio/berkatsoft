<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    //
    protected $fillable=[ 
    'customer_name',
    'address',
    'zip',
    'city',
    'province',
    'contact_person',
    'phone',
    'email',
    ];
}
