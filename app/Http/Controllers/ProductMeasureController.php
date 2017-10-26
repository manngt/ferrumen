<?php

namespace App\Http\Controllers;

use App\Magnitude;
use App\Metric;
use App\ProductMeasure;
use Illuminate\Http\Request;

class ProductMeasureController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $this->validate(

            request(),[

                'product_id' => 'required',

                'magnitude_id' => 'required',

                'metric_id' => 'required',

                'productMeasureValue' => 'required'

            ]
        );

        $request['id'] = time();

        ProductMeasure::create($request->all());

        return redirect()

            ->route('product.show',$request['product_id'])

            ->with('Correcto','Medida agregada correctamente');


    }

    public function edit($id)
    {

        return view('productmeasure.edit',[

            'productmeasure' => ProductMeasure::find($id),

            'magnitudes' => Magnitude::pluck('magnitudeName','id'),

            'metrics' => Metric::pluck('metricName','id')

        ]);
    }

    public function update(Request $request,$id)
    {

        $this->validate(

            request(),[

                'product_id' => 'required',

                'magnitude_id' => 'required',

                'metric_id' => 'required',

                'productMeasureValue' => 'required'

            ]
        );

        ProductMeasure::find($id)->update($request->all());

        return redirect()

            ->route('product.show',$request['product_id'])

            ->with('Correcto','Medida actualizada correctamente');

    }

    public function destroy($id)
    {

        $productmeasure = ProductMeasure::find($id);

        $productid = $productmeasure->product_id;

        $productmeasure->delete();

        return redirect()

            ->route('product.show', $productid)

            ->with('Correcto','Medida eliminada correctamente');

    }
}
