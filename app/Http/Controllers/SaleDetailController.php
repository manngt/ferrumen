<?php

namespace App\Http\Controllers;

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

        $saledetail = $request->all();

        $saledetail['id'] = time();

        $saledetail['productSalePrice'] = Product::find($saledetail['product_id'])->productPrice;

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

        $sale = $saledetail->sale_id;

        $saledetail->delete();


        return redirect()->route('sale.show',$sale)
            ->with('Correcto','Producto removido de la venta');

    }
    
}
