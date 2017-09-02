<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Metric;

class MetricController extends Controller
{
    
    public function index()
    {

    	$metrics = Metric::all();
        
        return view('metric.index',compact('metrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('metric.create');
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

            'metricName' => 'required',

            'metricSymbol' => 'required'

        ]);

        $request['id'] = time();

        $request['metricName'] = strtoupper($request['metricName']);

        Metric::create($request->all());

        return redirect()->route('metric.index')
                        ->with('Correcto','Medida creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metric = Metric::find($id);

        return view('metric.edit', compact('metric'));

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

            'metricName' => 'required',

            'metricSymbol' => 'required'

        ]);

        $request['metricName'] = strtoupper($request['metricName']);

        Metric::find($id)->update($request->all());

        return redirect()->route('metric.index')
                        ->with('Correcto','Medida actualizada satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Metric::find($id)->delete();

        return redirect()->route('metric.index')
                        ->with('Correcto','Medida eliminada satisfactoriamente');
    }

}
