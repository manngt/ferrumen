<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Brand;

use App\Category;

use App\Color;

use App\Supplier;

use App\ProductMeasure;

class Product extends Model
{
    
    protected $fillable = [

                            'id',

                            'productPicture',

    						'productName',

    						'productDescription',

    						'productCost',

    						'productPrice',

    						'productQuantity',

    						'category_id',

    						'brand_id',

    						'color_id',

    						'supplier_id'

    						];

    public function brands()
    {

    	return $this->belongsTo(Brand::class,'brand_id','id');

    }

    public function categories()
    {

    	return $this->belongsTo(Category::class,'category_id','id');

    }

    public function colors()
    {

    	return $this->belongsTo(Color::class,'color_id','id');

    }

    public function suppliers()
    {

    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function productMeasures()
    {

        return $this->hasMany(ProductMeasure::class,'product_id','id');
    }
}
