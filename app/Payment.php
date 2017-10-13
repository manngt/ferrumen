<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [

        'id',

        'sale_id',

        'paymentMethod_id'

    ];

    public function sale()
    {

        return $this->belongsTo(Sale::class,'sale_id','id');

    }

    public function paymentMethod()
    {

        return $this->belongsTo(PaymentMethod::class,'paymentMethod_id','id');

    }
}
