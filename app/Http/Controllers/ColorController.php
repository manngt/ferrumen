<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Color;

class ColorController extends Controller
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

    public function searchColor(Request $request)
    {
        $text = $request['search'];


        return view('color.index',[

            'colors'=> Color::where('colorName','like','%'.$text.'%')
                ->paginate(20)

        ]);

    }

    public function index()
    {

        $colors = Color::paginate(20);
        
        return view('color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('color.create');
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

            'colorName' => 'required',

            'colorHex' => 'required'

        ]);

        $request['id'] = time();

        $request['colorName'] = strtoupper($request['colorName']);

        $request['colorHex'] = strtoupper($request['colorHex']);

        Color::create($request->all());

        return redirect()->route('color.index')
                        ->with('Correcto','Color creado satisfactoriamente');
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
        $color = Color::find($id);

        return view('color.edit', compact('color'));

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

            'colorName' => 'required',

            'colorHex' => 'required'

        ]);

        $request['colorName'] = strtoupper($request['colorName']);

        $request['colorHex'] = strtoupper($request['colorHex']);        

        color::find($id)->update($request->all());

        return redirect()->route('color.index')
                        ->with('Correcto','Color actualizado satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Color::find($id)->delete();

        return redirect()->route('color.index')
                        ->with('Correcto','Color eliminado satisfactoriamente');
    }
}
