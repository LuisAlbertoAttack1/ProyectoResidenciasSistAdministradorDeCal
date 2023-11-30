<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CicloEscolar;
use App\Models\Horarios;
use App\Models\Persona;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HorariosController extends Controller
{
    private function validar_sesion(){
        return !Auth::user() || Auth::user()->fk_cat_rol != 1;
    }
    //funcion para obtener los datos del usuario con sesion activa 
    private function datos_sesion(){
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return $infoUsuario;        
    }

    public function listado_horarios(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Listado de horarios';
        $infoUsuario = $this->datos_sesion();
        $ciclo = CicloEscolar::select('id_ciclo_escolar')->orderBy('id_ciclo_escolar','desc')->first();
        $consulta = Horarios::select('id_horario','nombre_materia','nombre_carrera','lunes','martes','miercoles','jueves','viernes','grupo','t_horario.semestre')->join('t_materia','t_horario.fk_materia','t_materia.id_materia')->join('t_carrera','t_horario.fk_carrera','t_carrera.id_carrera')->where('fk_ciclo_escolar',$ciclo->id_ciclo_escolar)->get();
        return view('layouts/direccion/horarios', compact('titulo','infoUsuario','consulta'));
    }
}
