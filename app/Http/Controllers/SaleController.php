<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use App\Product;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Sale;

use App\SaleDetail;

use App\SaleStatus;

use App\Customer;

use App\Payment;

class SaleController extends Controller
{

    public function searchsale(Request $request)
    {
        $customers_ids = [];

        $text = $request['search'];

        $customers = Customer::where('customerName','like','%'.$text.'%')->get();


        foreach ($customers as $customer)
        {
            $customers_ids[] = $customer->id;
        }

        $sales = Sale::whereIn('customer_id',$customers_ids)->latest()->get();

        return view('sale.index',compact('sales'));
    }

    public function index()
    {
        return view('sale.index',[

            'sales' => Sale::latest()->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sale.create',[

            'salesstatuses' => SaleStatus::pluck('saleStatusName','id'),

            'customers' => Customer::pluck('customerName','id')
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

            'customer_id' => 'required',

            'invoiceSerial' => 'required',

            'invoiceNumber' => 'required',

        ]);

        $sale = $request->all();

        $sale['id'] = time();
        $sale['saleStatus_id'] = SaleStatus::where('saleStatusName','=','EN PROCESO')->first()->id;
        $sale['issueDate'] = Carbon::now();

        Sale::create($sale);

        return redirect()->route('sale.show',$sale['id'])
            ->with('Correcto','Venta creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        return view('sale.show',[

            'sale' => Sale::find($id),

            'products' => Product::where('productQuantity','>',0)->pluck('productName','id'),

            'paymentmethods' => PaymentMethod::pluck('paymentMethodName','id')

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
        return view('sale.edit',[

            'sale' => Sale::find($id),

            'salestatuses' => SaleStatus::pluck('saleStatusName','id'),

            'customers' => Customer::pluck('customerName','id')

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

            'saleStatus_id' => 'required',

            'customer_id' => 'required',

            'invoiceSerial' => 'required',

            'issueDate' => 'required',

            'saleStatus_id' => 'required'

        ]);

        Sale::find($id)->update($request->all());

        return redirect()->route('sale.index')
            ->with('Correcto','Venta actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);

        if(count($sale->saleDetail) > 0)
        {

            foreach ($sale->saleDetail as $saledetail)
            {
                Product::find($saledetail['product_id'])->increase($saledetail['product_id'],$saledetail->productSaleQuantity);
            }

        }

        SaleDetail::where('sale_id',$sale->id)->delete();

        Payment::where('sale_id',$sale->id)->delete();

        $sale->delete();

        return redirect()->route('sale.index')
            ->with('Correcto','Venta eliminada satisfactoriament');

    }
    
}
