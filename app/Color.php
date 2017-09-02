<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Color extends Model
{
    
    protected $fillable = ['id',

    						'colorName',

    						'colorHex'];

    public function products()
    {

    	return $this->hasMany(Product::class,'color_id','id');
    	
    }
}
