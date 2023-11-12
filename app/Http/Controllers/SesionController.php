<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SesionController extends Controller
{
    public function login(){
        $credenciales = request()->validate([
            'usuario' => ['required','string'],
            'password' => ['required','string'],
        ]);            
        
        $consultaUsuario = User::where('usuario', request()->usuario)->first();

        if($consultaUsuario){
            if(Hash::check(request()->password, $consultaUsuario->password)){
                Auth::login($consultaUsuario);
                request()->session()->regenerate();
                User::where('usuario', request()->usuario)->update(array('estado'=>'1'));
                return redirect('/');
            }else{
                throw ValidationException::withMessages([
                    'usuario' => 'Usuario o Contraseña no validos!'
                ]);                
            }
        }else{
            throw ValidationException::withMessages([
                'usuario' => 'Usuario o Contraseña no validos!'
            ]);            
        }

    }
}
