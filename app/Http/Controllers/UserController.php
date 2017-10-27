<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index',[

            'users' => User::all()

        ]);
    }


    public function show($id)
    {
        return view('user.show',[

            'user' => User::find($id)
        ]);

    }

    public function create()
    {

        return view('user.create');

    }

    public function store(Request $request)
    {
        $this->validate(request(),[

            'name' => 'required',

            'email' => 'required',

            'password' => 'required'

        ]);

        $request['password'] = bcrypt($request['password']);

        User::create($request->all());

        return redirect()->route('user.index')

            ->with('Correcto','Usuario creado satisfactoriamente');
    }

    public function edit($id)
    {
        return view('user.edit',[

            'user' => User::find($id)

        ]);
    }

    public function  update(Request $request, $id)
    {

        $this->validate(request(),[

            'name' => 'required',

            'email' => 'required',

            'password' => 'required'

        ]);

        User::find($id)->update($request->all());

        return redirect()->route('user.show',$id )

            ->with('Correcto','Usuario actualizado satisfactoriamente');

    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('user.index')

            ->with('Correcto','Usuario eliminado satisfactoriamente');
    }
}
