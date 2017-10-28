<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;

class SupplierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchSupplier(Request $request)
    {
        $text = $request['search'];


        return view('supplier.index',[

            'suppliers'=> Supplier::where('supplierName','like','%'.$text.'%')
                ->paginate(20)

        ]);

    }
    
    public function index()
    {

    	$suppliers = Supplier::paginate(20);
        
        return view('supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('supplier.create');
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

            'supplierName' => 'required',

            'supplierNit' => 'required',

            'supplierPhone' => 'required|numeric|max:99999999',

            'supplierEmail' => 'required|email',

            'supplierAddress' => 'required'

        ]);

        $request['id'] = time();

        $request['supplierName'] = strtoupper($request['supplierName']);

        supplier::create($request->all());

        return redirect()->route('supplier.index')
                        ->with('Correcto','Proveedor creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('supplier.show',[

            'supplier' => Supplier::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.edit', compact('supplier'));

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

            'supplierName' => 'required',

            'supplierNit' => 'required',

            'supplierPhone' => 'required|numeric|max:99999999',

            'supplierEmail' => 'required|email',

            'supplierAddress' => 'required'

        ]);

        $request['supplierName'] = strtoupper($request['supplierName']);

        Supplier::find($id)->update($request->all());

        return redirect()->route('supplier.index')
                        ->with('Correcto','Proveedor actualizado satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Supplier::find($id)->delete();

        return redirect()->route('supplier.index')
                        ->with('Correcto','Proveedor eliminado satisfactoriamente');
    }

}
