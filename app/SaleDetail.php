<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{

    protected $fillable = [

        'id',

        'sale_id',

        'product_id',

        'productSaleQuantity',

        'productSalePrice',

    ];

    public function sale()
    {

        return $this->belongsTo(Sale::class,'sale_id','id');

    }

    public function product()
    {

        return $this->belongsTo(Product::class,'product_id','id');

    }

    public function getTotalPrice()
    {

        return $this->productSaleQuantity * $this->productSalePrice;

    }
}
