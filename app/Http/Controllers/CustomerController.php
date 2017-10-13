<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {

        $customers = Customer::latest()->get();


        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[

            'customerName' => 'required',

            'id' => 'required'

        ]);

        $request['customerName'] = strtoupper($request['customerName']);

        Customer::create($request->all());

        return redirect()->route('customer.index')
            ->with('Correcto','Cliente creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customer.show',['customer' => Customer::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        
        return view('customer.edit', compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(),[

            'customerName' => 'required',

            'id' => 'required'

        ]);

        $request['customerName'] = strtoupper($request['customerName']);

        Customer::find($id)->update($request->all());

        return redirect()->route('customer.index')
            ->with('Correcto','Cliente actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Customer::find($id)->delete();

        return redirect()->route('customer.index')
            ->with('Correcto','Cliente eliminado satisfactoriamente');
    }
    
}
