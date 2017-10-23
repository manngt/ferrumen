<?php

namespace App\Http\Controllers;

use App\Sale;
use App\SaleDetail;
use Illuminate\Http\Request;
use App\Product;
class SaleDetailController extends Controller
{

    public function index()
    {
        return view('saledetail.index',[

            'saledetails' => SaleDetail::latest()->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        return view('saledetail.create',[

            'sale_id' => $request['sale_id'],

            'products' => Product::pluck('productName','id')

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

            'sale_id' => 'required',

            'product_id' => 'required',

            'productSaleQuantity' => 'required|numeric|min:1',

        ]);

        $sale = Sale::find($request['sale_id']);

        if($sale->isFinished() || $sale->isCanceled())
        {
            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');
        }

        $saledetail = $request->all();


        $sd = SaleDetail::where('sale_id','=',$saledetail['sale_id'])
            ->where('product_id','=',$saledetail['product_id'])->first();

        if(Product::find($saledetail['product_id'])->productQuantity < $saledetail['productSaleQuantity'])
        {
            return redirect()->route('sale.show', $request['sale_id'])
                ->with('Incorrecto','Hay menos producto del solicitado');
        }

        if(!empty($sd))
        {
            return redirect()->route('sale.show', $request['sale_id'])
                ->with('Incorrecto','Ya existe el producto en esta venta');
        }

        $saledetail['id'] = time();

        $productdiscount = Product::find($saledetail['product_id'])->productDiscount;

        $discount = $productdiscount * $saledetail['productSaleQuantity'];

        $saledetail['productSaleDiscount'] = $discount;

        $saledetail['productSalePrice'] = Product::find($saledetail['product_id'])->productPrice;

        Product::find($saledetail['product_id'])->decrease($saledetail['product_id'],$saledetail['productSaleQuantity']);

        SaleDetail::create($saledetail);

        return redirect()->route('sale.show', $request['sale_id'])
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
        return view('saledetail.show',[

            'saledetail' => SaleDetail::find($id)

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

        $saledetail = SaleDetail::find($id);

        $sale = Sale::find($saledetail->sale_id);

        if($sale->isFinished() || $sale->isCanceled())
        {
            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');
        }

        return view('saledetail.edit',[

            'saledetail' => SaleDetail::find($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this->validate(request(),[

            'sale_id' => 'required',

            'product_id' => 'required',

            'productSaleQuantity' => 'required|numeric|min:1',

        ]);

        $sale = Sale::find($request['sale_id']);

        if($sale->isFinished() || $sale->isCanceled())
        {
            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');
        }

        $saledetail = $request->all();


        $sd = SaleDetail::where('sale_id','=',$saledetail['sale_id'])
            ->where('product_id','=',$saledetail['product_id'])->first();

        $productdiscount = Product::find($request['product_id'])->productDiscount;

        $request['productSaleDiscount'] = $request['productSaleQuantity'] * $productdiscount;

        SaleDetail::find($id)->update($request->all());

        return redirect()->route('sale.show',$request['sale_id'])
            ->with('Correcto','Producto actualizado en la venta');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $saledetail = SaleDetail::find($id);

        $sale = Sale::find($saledetail->sale_id);

        if(count($sale->payment) >0)
        {
            return redirect()->route('sale.show',$sale->id)
                ->with('Incorrecto','No puede quitar productos, hay pagos aplicados');
        }

        if($sale->isFinished() || $sale->isCanceled())
        {
            return redirect()->route('sale.show',$sale->id)

                ->with('Incorrecto','La venta esta finalizada o cancelada');
        }

        Product::find($saledetail['product_id'])->increase($saledetail['product_id'],$saledetail->productSaleQuantity);

        $saleid = $saledetail->sale_id;

        $saledetail->delete();


        return redirect()->route('sale.show',$saleid)
            ->with('Correcto','Producto removido de la venta');

    }
    
}
