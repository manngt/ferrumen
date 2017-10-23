<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PaymentMethod;
use App\Sale;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {

        $this->validate(request(),[

            'sale_id' => 'required',

            'paymentMethod_id' => 'required',

            'paymentAmount' => 'required',

        ]);

        $sale = Sale::find($request['sale_id']);

        if($sale->isPaided())
        {

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','Los pagos aplicados cubren el monto vendido');
        }

        if($sale->isFinished() || $sale->isCanceled())
        {

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');

        }

        if($sale->getTotalAmount() < $request['paymentAmount'])
        {

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','El pago supera en monto de venta');
        }

        $newTotalPayment = $sale->getTotalPaymentAmount() + $request['paymentAmount'];

        if(round($newTotalPayment,2) > round($sale->getTotalAmount(),2))
        {
            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','El nuevo supera en monto de venta');
        }

        $request['id'] = time();

        Payment::create($request->all());

        return redirect()->route('sale.show',$request['sale_id'])
            ->with('Correcto','Pago aplicado correctamente');

    }

    public  function edit($id)
    {
        $payment = Payment::find($id);

        $sale = Sale::find($payment->sale_id);

        if($sale->isFinished() || $sale->isCanceled())
        {

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');

        }


        return view('payment.edit',[

            'payment' => $payment,

            'paymentmethods' => PaymentMethod::pluck('paymentMethodName','id')

        ]);

    }

    public function update(Request $request,$id)
    {

        $this->validate(request(),[

            'sale_id' => 'required',

            'paymentMethod_id' => 'required',

            'paymentAmount' => 'required',

        ]);

        $sale = Sale::find($request['sale_id']);


        if($sale->isFinished() || $sale->isCanceled())
        {

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');

        }

        $payment = Payment::find($id);

        $newTotalPayment = ($sale->getTotalPaymentAmount() - $payment->paymentAmount) + $request['paymentAmount'];

        if($sale->getTotalAmount() < $newTotalPayment)
        {

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','El pago supera el monto de venta');

        }

        $payment = Payment::find($id);

        if($sale->getTotalAmount() < $request['paymentAmount']){

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','El pago supera el monto total de la venta');
        }

        $payment->update($request->all());

        return redirect()->route('sale.show',$request['sale_id'])
            ->with('Correcto','Pago actualizado correctamente');
    }

    public function destroy($id)
    {

        $payment = Payment::find($id);

        $sale = Sale::find($payment->sale_id);

        if($sale->isFinished() || $sale->isCanceled())
        {

            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');

        }

        $saleid = $payment->sale_id;

        $payment->delete();

        Return redirect()->route('sale.show',$saleid)
        ->with('Correcto','Pago eliminado correctamente');
    }
}
