<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SesionController extends Controller
{
    public function login(){
        $credenciales = request()->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);            
        
        $user = User::where('usuario', request()->usuario)->first();
        if($user){
            if(Hash::check(request()->password, $user->password)){
                Auth::login($user);
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

    public function logout(){
        User::where('usuario',  Auth::user()->usuario)->update(array('estado'=>'2'));
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
