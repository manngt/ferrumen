<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseDetail;
use App\Purchase;
use Illuminate\Http\Request;
use DB;

class PurchaseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchasedetail.index',[

            'purchasedetails' => PurchaseDetail::latest()->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        return view('purchasedetail.create',[

            'purchase_id' => $request['purchase_id'],

            'products' => Product::where('supplier_id',$request['supplier_id'])

        ]);

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

            'purchase_id' => 'required',

            'product_id' => 'required',

            'productQuantity' => 'required'

        ]);

        PurchaseDetail::create($request->all());

        return redirect()->route('purchase.show', $request['purchase_id'])
            ->with('Correcto','Producto agregado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('purchasedetail.show',[

            'purchasedetail' => PurchaseDetail::find($id)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        return view('purchasedetail.edit',[

            'purchasedetail' => PurchaseDetail::where('purchase_id','=',$request['purchase_id'])
                ->where('product_id','=',$request['product_id'])->first()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate(request(),[

            'purchase_id' => 'required',

            'product_id' => 'required',

            'productQuantity' => 'required|numeric|min:1'

        ]);

        DB::table('purchase_details')
        ->where('purchase_id',$request['purchase_id'])
        ->where('product_id',$request['product_id'])
        ->update(['productQuantity'=>$request['productQuantity']]);

        return redirect()->route('purchase.show',$request['purchase_id'])
            ->with('Correcto','Producto actualizado en la compra');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        $purchasedetail = $request->all();
        $purchase_id = $purchasedetail['purchase_id'];

        PurchaseDetail::where('purchase_id','=',$request['purchase_id'])
            ->where('product_id','=',$request['product_id'])->delete();


        return redirect()->route('purchase.show',$purchase_id)
            ->with('Correcto','Producto removido de la compra');

    }
}
