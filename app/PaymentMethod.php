<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

    protected $fillable = [

        'id',

        'paymentMethodName'

    ];

    public function payment()
    {

        return $this->hasMany(Payment::class,'paymentMethod_id','id');

    }
}
