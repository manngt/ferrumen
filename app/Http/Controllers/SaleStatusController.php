<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SaleStatus;

class SaleStatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $salestatuses = SaleStatus::latest()->get();

        return view('salestatus.index',compact('salestatuses'));
    }

    public function create()
    {

        return view('salestatus.create');
        
    }

    public function store(Request $request)
    {
        $this->validate(request(),[

            'saleStatusName' => 'required',

            'saleStatusDescription' => 'required'

        ]);

        $request['id'] = time();

        $request['saleStatusName'] = strtoupper($request['saleStatusName']);


        SaleStatus::create($request->all());

        return redirect()->route('salestatus.index')
            ->with('Correcto','Estado creado correctamente');
    }

    public function edit($id)
    {
        $salestatus = SaleStatus::find($id);

        return view('salestatus.edit', compact('salestatus'));

    }

    public function update(Request $request, $id)
    {

        $this->validate(request(),[

            'saleStatusName' => 'required',

            'saleStatusDescription' => 'required'

        ]);

        $request['saleStatusName'] = strtoupper($request['saleStatusName']);


        SaleStatus::find($id)->update($request->all());

        return redirect()->route('salestatus.index')
            ->with('Correcto','Estado actualizado correctamente');

    }

    public function destroy($id)
    {

        SaleStatus::find($id)->delete();

        return redirect()->route('salestatus.index')
            ->with('Correcto','Estado eliminado satisfactoriamente');
    }
    
}
