<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{

    
    public function login()
    {
        //RUTAS DE LOGIN
        $title = 'LOGIN PRINCIPAL';
        if (Auth::check()) {
            return redirect()->route('inicio');
        }
        return view('login/login', compact('title'));
    }
   
    public function logear(Request $request)
    {
        //va a obtener los datos
        $credenciales = $request->only('user', 'password');

        if (Auth::attempt($credenciales)) {
            return redirect()->route('inicio');
        } else {
            return back()->withInput($credenciales);
        }

    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
