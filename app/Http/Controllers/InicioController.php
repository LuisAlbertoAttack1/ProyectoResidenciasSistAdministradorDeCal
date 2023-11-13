<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index(){
        $titulo = 'Inicio';
        return view('home', compact('titulo'));
    }

    public function login(){
        $titulo = 'Login';
        $dt = Auth::user()->usuario;
        /* if(Auth::user()->usuario){
            return redirect('/');
        } */
        return view('login/login', compact('titulo','dt'));
    }
}
