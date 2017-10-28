<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\PurchaseDetail;
use App\PurchaseStatus;
use Illuminate\Http\Request;

use App\Supplier;
use DB;
use App\Product;

class PurchaseController extends Controller
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
    public function searchPurchase(Request $request)
    {
        $suppliers_ids = [];

        $text = $request['search'];

        $suppliers = Supplier::where('supplierName','like','%'.$text.'%')->get();


        foreach ($suppliers as $supplier)
        {
            $suppliers_ids[] = $supplier->id;
        }

        $purchases = Purchase::whereIn('supplier_id',$suppliers_ids)->latest()->get();

        return view('purchase.index',compact('purchases'));
    }
    public function index()
    {
        return view('purchase.index',[

            'purchases' => Purchase::latest()->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('purchase.create',[

            'purchasesstatuses' => PurchaseStatus::pluck('purchaseStatusName','id'),

            'suppliers' => Supplier::pluck('supplierName','id')
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

            'supplier_id' => 'required',

            'purchaseReceptionDate' => 'required'

        ]);

        $purchase = $request->all();

        $purchase['id'] = time();
        $purchase['purchaseStatus_id'] = PurchaseStatus::where('purchaseStatusName','=','INICIAL')->first()->id;

        Purchase::create($purchase);

        return redirect()->route('purchase.show',$purchase['id'])
            ->with('Correcto','Compra creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $supplier = Purchase::find($id)->supplier_id;

        return view('purchase.show',[

            'purchase' => Purchase::find($id),

            'products' => Product::where('supplier_id','=', $supplier)
                ->pluck('productName','id'),

            'purchasestatus' => PurchaseStatus::orderby('purchaseStatusSequence')

                ->pluck('purchaseStatusName','id')

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
        $purchasedetail= count(Purchase::find($id)->purchaseDetail);

        if($purchasedetail>0)
        {
            return redirect()->route('purchase.show',$id)

                ->with('Incorrecto','No puede editar la compra, tiene productos');
        }

        return view('purchase.edit',[

            'purchase' => Purchase::find($id),

            'purchasestatuses' => PurchaseStatus::pluck('purchaseStatusName','id'),

            'suppliers' => Supplier::pluck('supplierName','id')

        ]);
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

            'purchaseStatus_id' => 'required',

            'supplier_id' => 'required',

            'purchaseReceptionDate' => 'required'

        ]);

        $purchase = Purchase::find($id);


        if($purchase->purchaseStatus->purchaseStatusSequence > PurchaseStatus::find($request['purchaseStatus_id'])->purchaseStatusSequence)
        {
            return redirect()->route('purchase.show',$id)

                ->with('Incorrecto','No se puede regresar a un estado anterior');
        }

        $purchasestatus = PurchaseStatus::find($request['purchaseStatus_id']);

        if($purchasestatus->purchaseStatusName == 'RECIBIDA')
        {

            if(count($purchase->purchaseDetail)>0){

                foreach ($purchase->purchasedetail as $pd)
                {

                    Product::find($pd->product_id)->increase($pd->product_id,$pd->productQuantity);

                }

            }

        }

        if($purchase->isReceived() && $purchasestatus->purchaseStatusName == 'CANCELADA')
        {

            if(count($purchase->purchaseDetail)>0){

                foreach ($purchase->purchasedetail as $pd)
                {

                    Product::find($pd->product_id)->decrease($pd->product_id,$pd->productQuantity);

                }

            }

        }


       $purchase->update($request->all());

        return redirect()->route('purchase.show',$id)

            ->with('Correcto','Compra actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);


        if($purchase->purchaseStatus->purchaseStatusSequence > 1)
        {

            return redirect()->route('purchase.index')

                ->with('Incorrecto','La compra solo puede ser cancelada');

        }


        PurchaseDetail::where('purchase_id',$purchase->id)->delete();

        $purchase->delete();

        return redirect()->route('purchase.index')

            ->with('Correcto','Compra eliminada satisfactoriament');

    }
}
