<?php

namespace App\Http\Controllers;

use App\PurchaseStatus;
use Illuminate\Http\Request;

class PurchaseStatusController extends Controller
{

    public function index()
    {

        $purchasestatuses = PurchaseStatus::all();

        return view('purchasestatus.index',compact('purchasestatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('purchasestatus.create');
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

            'purchaseStatusName' => 'required',

            'purchaseStatusDescription' => 'required'

        ]);

        $request['id'] = time();

        $request['purchaseStatusName'] = strtoupper($request['purchaseStatusName']);


        PurchaseStatus::create($request->all());

        return redirect()->route('purchasestatus.index')
            ->with('Correcto','Estado creado correctamente');
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
        $purchasestatus = PurchaseStatus::find($id);

        return view('purchasestatus.edit', compact('purchasestatus'));

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

            'purchaseStatusName' => 'required',

            'purchaseStatusDescription' => 'required'

        ]);

        $request['purchaseStatusName'] = strtoupper($request['purchaseS tatusName']);


        PurchaseStatus::find($id)->update($request->all());

        return redirect()->route('purchasestatus.index')
            ->with('Correcto','Estado actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        PurchaseStatus::find($id)->delete();

        return redirect()->route('purchasestatus.index')
            ->with('Correcto','Estado eliminado satisfactoriamente');
    }
    
}
