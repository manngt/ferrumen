<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{

    protected  $fillable = [

        'purchase_id',

        'product_id',

        'productQuantity',

        'productPurchaseCost'

    ];

    public function purchase()
    {

        return $this->belongsTo(Purchase::class,'purchase_id','id');

    }

    public function product()
    {

        return $this->belongsTo(Product::class,'product_id','id');

    }

    public function getTotalPrice()
    {

        return $this->productQuantity * $this->productPurchaseCost;

    }

}


