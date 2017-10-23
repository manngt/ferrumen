<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseStatus extends Model
{

    protected $fillable = [

        'id',

        'purchaseStatusName',

        'purchaseStatusSequence',

        'purchaseStatusDescription',

    ];

    public function purchase()
    {

        return $this->hasMany(PurchaseStatus::class,'purchaseStatus_id','id');
    }

}
