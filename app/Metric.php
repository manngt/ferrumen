<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ProductMeasure;

class Metric extends Model
{
    
    protected $fillable = ['id','metricName','metricSymbol'];

    public function productMeasures()
    {

    	return $this->hasMany(ProductMeasure::class,'metric_id','id');

    }
}
