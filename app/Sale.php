<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $fillable = [

        'id',

        'customer_id',

        'saleStatus_id',

        'invoiceSerial',

        'invoiceNumber',

        'issueDate'

    ];

    public function customer()
    {

        return $this->belongsTo(Customer::class,'customer_id','id');

    }

    public function saleStatus()
    {

        return $this->belongsTo(SaleStatus::class,'saleStatus_id','id');

    }

    public function saleDetail()
    {

        return $this->hasMany(SaleDetail::class,'sale_id','id');
        
    }

    public function payment()
    {

        return $this->hasMany(Payment::class,'sale_id','id');
    }

    public function getTotalAmount()
    {
        $total = 0;

        foreach ($this->saleDetail as $sd)
        {
            $total += $sd->getTotalPrice();
        }

        return $total;

    }
}
