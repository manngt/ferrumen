<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Magnitude;

class MagnitudeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

    	$magnitudes = Magnitude::all();
        
        return view('magnitude.index',compact('magnitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('magnitude.create');
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

            'magnitudeName' => 'required'

        ]);

        $request['id'] = time();

        $request['magnitudeName'] = strtoupper($request['magnitudeName']);

        Magnitude::create($request->all());

        return redirect()->route('magnitude.index')
                        ->with('Correcto','Magnitud creada satisfactoriamente');
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
        $magnitude = Magnitude::find($id);

        return view('magnitude.edit', compact('magnitude'));

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

            'magnitudeName' => 'required'

        ]);

        $request['magnitudeName'] = strtoupper($request['magnitudeName']);

        Magnitude::find($id)->update($request->all());

        return redirect()->route('magnitude.index')
                        ->with('Correcto','Magnitud actualizada satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Magnitude::find($id)->delete();

        return redirect()->route('magnitude.index')
                        ->with('Correcto','Magnitud eliminada satisfactoriamente');
    }

}
