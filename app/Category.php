<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Category extends Model
{
    
    protected $fillable = ['id',

    						'categoryName',

    						'categoryDescription'];

    public function products()
    {

    	return $this->hasMany(Product::class,'category_id','id');
    	
    }
}
