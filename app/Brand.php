<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Brand extends Model
{
    
    protected $fillable = ['id',

    						'brandName'];

	public function products()
	{

		return $this->hasMany(Product::class,'brand_id','id');
		
	}    
}
