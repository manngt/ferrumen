<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ProductMeasure;

class Magnitude extends Model
{
    
    protected $fillable = ['id','magnitudeName'];

    public function productMeasures()
    {

    	return $this->hasMany(ProductMeasure::class,'magnitude_id','id');
    	
    }
}
