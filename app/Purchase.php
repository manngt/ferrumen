<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [

        'id',

        'purchaseStatus_id',

        'supplier_id',

        'purchaseReceptionDate'

    ];

    public function purchaseStatus()
    {

        return $this->belongsTo(PurchaseStatus::class,'purchaseStatus_id','id');

    }

    public function purchaseDetail()
    {

        return $this->hasMany(PurchaseDetail::class,'purchase_id','id');

    }

    public function supplier()
    {

        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function getTotalAmount()
    {
        $total = 0;

        foreach ($this->purchaseDetail as $pd)
        {
            $total += $pd->getTotalPrice();
        }

        return $total;
    }

    public function isReceived()
    {
        if($this->purchaseStatus->purchaseStatusName == 'RECIBIDA')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isCanceled()
    {

        if($this->purchaseStatus->pruchaseStatusName == 'CANCELDA')
        {
            return true;
        }
        else
        {

            return false;
        }
    }
}
