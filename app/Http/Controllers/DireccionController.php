<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DireccionController extends Controller
{
    public function usuarios(){
        if(Auth::user()->fk_cat_rol != 1){
            return redirect('/');
        }
        $titulo = 'Listado de usuarios';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;

        $consulta = Usuario::select('id_usuario','usuario','nombre','apellido_paterno','apellido_materno','t_cat_rol.rol')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->get();
        return view('layouts/direccion/usuarios', compact('titulo','infoUsuario','consulta'));
    }
    public function agregar_usuario(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Inicio';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return view('layouts/direccion/addUser', compact('titulo','infoUsuario'));
    }
    public function asignacion_materia(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Inicio';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return view('layouts/direccion/AsignacionMaterias', compact('titulo','infoUsuario'));
    }
    public function editar_asignacion_materias(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Inicio';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return view('layouts/direccion/EditarAsignacionMat', compact('titulo','infoUsuario'));
    }
    public function Aprobados_y_Reprobados(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Inicio';
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return view('layouts/direccion/Aprobadosyreprobados', compact('titulo','infoUsuario'));
    }

}
