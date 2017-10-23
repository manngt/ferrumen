<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Magnitude;

use App\Metric;

use App\Product;

class ProductMeasure extends Model
{
    protected $fillable = ['id',

    						'product_id',

    						'productMeasureValue',

    						'magnitude_id',

    						'metric_id'

    						];

    public function magnitudes()
    {

    	return $this->belongsTo(Magnitude::class,'magnitude_id','id');

    }

    public function metric()
    {

    	return $this->belongsTo(Metric::class,'metric_id','id');

    }

    public function products()
    {

    	return $this->belongsTo(Product::class,'product_id','id');

    }
    
}
