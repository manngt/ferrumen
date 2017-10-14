<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PaymentMethod;
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

        $request['id'] = time();

        Payment::create($request->all());

        return redirect()->route('sale.show',$request['sale_id'])
            ->with('Correcto','Pago aplicado correctamente');

    }

    public  function edit($id)
    {


        return view('payment.edit',[

            'payment' => Payment::find($id),

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

        Payment::find($id)->update($request->all());

        return redirect()->route('sale.show',$request['sale_id'])
            ->with('Correcto','Pago actualizado correctamente');
    }

    public function destroy($id)
    {

        $payment = Payment::find($id);



        $saleid = $payment->sale_id;

        $payment->delete();

        Return redirect()->route('sale.show',$saleid)
        ->with('Correcto','Pago eliminado correctamente');
    }
}
