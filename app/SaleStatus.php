<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStatus extends Model
{

    protected $fillable = [

        'id',

        'saleStatusName',

        'saleStatusDescription'

    ];

    public function sale()
    {

        return $this->hasMany(Sale::class,'saleStatus_id','id');

    }
}
