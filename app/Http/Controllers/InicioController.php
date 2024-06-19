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
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Panel de control';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        if(Auth::user()->fk_cat_rol == 1){
            return view('layouts/dashboard1', compact('titulo','infoUsuario')); 
        }
        if(Auth::user()->fk_cat_rol == 2){
            return view('layouts/dashboard1', compact('titulo','infoUsuario')); 
        }
        if(Auth::user()->fk_cat_rol == 3){
            return view('layouts/dashboard3', compact('titulo','infoUsuario')); 
        }
        return redirect('/');
    }
    
}
