<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Inicio';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return view('home', compact('titulo','infoUsuario'));
    }

    public function login(){
        if(Auth::user()){
            return redirect('/');
        }
        $titulo = 'Login';
        return view('login/login', compact('titulo'));
    }
    public function panel(){
        if(Auth::user()->fk_cat_rol != 1){
            return redirect('/');
        }
        $titulo = 'Login';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return view('layouts/main', compact('titulo','infoUsuario'));
    }
}
