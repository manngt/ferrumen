<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PaymentMethod;

class PaymentMethodController extends Controller
{

    public function index()
    {

        $paymentmethods = Paymentmethod::latest()->get();

        return view('paymentmethod.index',compact('paymentmethods'));
    }

    public function create()
    {

        return view('paymentmethod.create');

    }

    public function store(Request $request)
    {
        $this->validate(request(),[

            'paymentMethodName' => 'required'

        ]);

        $request['id'] = time();

        $request['paymentMethodName'] = strtoupper($request['paymentMethodName']);


        PaymentMethod::create($request->all());

        return redirect()->route('paymentmethod.index')
            ->with('Correcto','Metodo de pago creado correctamente');
    }

    public function edit($id)
    {
        $paymentmethod = PaymentMethod::find($id);

        return view('paymentmethod.edit', compact('paymentmethod'));

    }

    public function update(Request $request, $id)
    {

        $this->validate(request(),[

            'paymentMethodName' => 'required'

        ]);

        $request['paymentMethodName'] = strtoupper($request['paymentMethodName']);


        PaymentMethod::find($id)->update($request->all());

        return redirect()->route('paymentmethod.index')
            ->with('Correcto','Metodo de pago actualizado correctamente');

    }

    public function destroy($id)
    {

        PaymentMethod::find($id)->delete();

        return redirect()->route('paymentmethod.index')
            ->with('Correcto','Metodo de pago eliminado satisfactoriamente');
    }
    
}
