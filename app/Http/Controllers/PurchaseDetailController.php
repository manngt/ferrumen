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

    public function __construct()
    {
        $this->middleware('auth');
    }
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

            'productQuantity' => 'required|numeric|min:1',

            'productPurchaseCost' => 'required|numeric|min:1'

        ]);

        $purchase = Purchase::find($request['purchase_id']);

        if($purchase->purchaseStatus->purchaseStatusSequence > 1)
        {

            return redirect()->route('purchase.show',$request['purchase_id'])

                ->with('Incorrecto','No pueden agregar productos en el estado actual');

        }

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

        $purchase = Purchase::find($request['purchase_id']);

        if($purchase->purchaseStatus->purchaseStatusSequence > 1)
        {
            return redirect()->route('purchase.show',$purchase->id)

                ->with('Incorrecto','No se puede editar productos por el estado actual');
        }

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

            'productQuantity' => 'required|numeric|min:1',

            'productPurchaseCost' => 'required|numeric|min:1'

        ]);

        $purchase = Purchase::find($request['purchase_id']);

        if($purchase->purchaseStatus->purchaseStatusSequence > 1)
        {

            return redirect()->route('purchase.show',$purchase->id)

                ->with('Incorrecto','La compra editar productos por el estado actual');

        }

        DB::table('purchase_details')

        ->where('purchase_id',$request['purchase_id'])

        ->where('product_id',$request['product_id'])

        ->update([

            'productQuantity'=>$request['productQuantity'],

            'productPurchaseCost' => $request['productPurchaseCost']]);

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
        $purchase = Purchase::find($request['purchase_id']);

        if($purchase->purchaseStatus->purchaseStatusSequence > 1)
        {
            return redirect()->route('purchase.show',$purchase->id)

                ->with('Incorrecto','No se permite eliminar productos, por el estado actual');
        }


        PurchaseDetail::where('purchase_id','=',$request['purchase_id'])
            ->where('product_id','=',$request['product_id'])->delete();


        return redirect()->route('purchase.show',$purchase_id)
            ->with('Correcto','Producto removido de la compra');

    }
}
