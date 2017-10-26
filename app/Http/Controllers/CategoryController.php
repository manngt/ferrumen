<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $categories = Category::all();
        
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('category.create');
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

            'categoryName' => 'required',

            'categoryDescription' => 'required'

        ]);

        $request['id'] = time();

        $request['categoryName'] = strtoupper($request['categoryName']);


        Category::create($request->all());

        return redirect()->route('category.index')
                        ->with('Correcto','Categoría creada satisfactoriamente');
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
        $category = Category::find($id);

        return view('category.edit', compact('category'));

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

            'categoryName' => 'required',

            'categoryDescription' => 'required'

        ]);

        $request['categoryName'] = strtoupper($request['categoryName']);


        Category::find($id)->update($request->all());

        return redirect()->route('category.index')
                        ->with('Correcto','Categoría actualizada satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Category::find($id)->delete();

        return redirect()->route('category.index')
                        ->with('Correcto','Categoría eliminada satisfactoriamente');
    }

}
