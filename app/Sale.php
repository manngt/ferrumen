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

        return round($total,2);

    }

    public function getTotalPaymentAmount()
    {
        $total = 0;

        foreach($this->payment as $payment)
        {
            $total += $payment->paymentAmount;
        }

        return round($total,2);
    }

    public function isPaided()
    {

        if($this->diffAmount() == 0)
        {
            return true;
        }
        else
        {

            return false;

        }
    }

    public function diffAmount()
    {

        return round($this->getTotalAmount() - $this->getTotalPaymentAmount(),2);

    }

    public function isFinished()
    {
        if($this->saleStatus->saleStatusName == 'FINALIZADA')
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
        if($this->saleStatus->saleStatusName == 'CANCELADA')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
