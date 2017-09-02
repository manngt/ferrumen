<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Supplier extends Model
{
    
    protected $fillable = ['id',

    						'supplierName',

    						'supplierNit'

    						];

    public function products()
    {

    	return $this->hasMany(Product::class,'suuplier_id','id');
    }

}
