<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Brand;

use App\Category;

use App\Color;

use DB;

use App\Supplier;

class ProductController extends Controller
{
    
    public function index()
    {

    	$products = Product::all();
        
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('product.create',[

                                        'brands' => Brand::pluck('brandName','id'),

                                        'categories' => Category::pluck('categoryName','id'),

                                        'colors' => Color::pluck('colorName','id'),

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

        	'productPicture' => 'required',

            'productName' => 'required',

            'productDescription' => 'required',

    		'productCost' => 'required',

    		'productPrice' => 'required',

    		'productQuantity' => 'required',

    		'category_id' => 'required',

    		'brand_id' => 'required',

    		'color_id' => 'required',

    		'supplier_id' => 'required'

        ]);

        $request['id'] = time();

        $request['productName'] = strtoupper($request['productName']);

        $pictureName = time().'-'.$request['productPicture']->getClientOriginalName();

        $request['productPicture'] = $request['productPicture']->move(public_path().'/images/',$pictureName);

        $request['productPicture'] = $pictureName;

        Product::create($request->all());

        return redirect()->route('product.index')
                        ->with('Correcto','Producto creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    	$product = Product::find($id);
        
        return view('product.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', [
                                        'product' => Product::find($id),

                                        'brands' => Brand::pluck('brandName','id'),

                                        'categories' => Category::pluck('caterogyName','id'),

                                        'colors' => Color::pluck('colorName','id'),

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

        	'productPicture' => 'required',

            'productName' => 'required',

            'productDescription' => 'required',

    		'productCost' => 'required',

    		'productPrice' => 'required',

    		'productQuantity' => 'required',

    		'category_id' => 'required',

    		'brand_id' => 'required',

    		'color_id' => 'required',

    		'supplier_id' => 'required'

        ]);

        $request['productName'] = strtoupper($request['productName']);

        $pictureName = time().'-'.$request['productPicture']->getClientOriginalName();

        $request['productPicture'] = $request['productPicture']->move(public_path().'/images/',$pictureName);

        $request['productPicture'] = $pictureName;

        Product::find($id)->update($request->all());

        return redirect()->route('product.index')
                        ->with('Correcto','Producto actualizado satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Product::find($id)->delete();

        return redirect()->route('product.index')
                        ->with('Correcto','Producto eliminado satisfactoriamente');
    }

}
