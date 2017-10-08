<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Supplier extends Model
{
    
    protected $fillable = ['id',

    						'supplierName',

    						'supplierNit',

                            'supplierPhone',

                            'supplierEmail',

                            'supplierAddress'

    						];

    public function products()
    {

    	return $this->hasMany(Product::class,'supplier_id','id');
    }

    public function purchase()
    {

        return $this->hasMany(Purchase::class,'supplier_id','id');
    }

}
