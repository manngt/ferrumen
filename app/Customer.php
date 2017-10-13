<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $casts = ['id' => 'string'];

    protected $fillable = [

        'id',

        'customerName',

        'customerEmail',

        'customerPhone',

        'customerAddress'

    ];

    public function sale()
    {

        return $this->hasmany(Sale::class,'customer_id','id');

    }
}


