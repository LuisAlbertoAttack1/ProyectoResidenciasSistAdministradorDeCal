<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\CicloEscolar;
use App\Models\Horarios;
use App\Models\Materias;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HorariosController extends Controller{
    private function lista_carreras(){
        $consulta = Carrera::where('id_carrera','!=','0')->get();
        return $consulta;
    }
    private function validar_sesion(){
        return !Auth::user() || Auth::user()->fk_cat_rol != 1;
    }
    private function lista_docentes(){
       $consulta = Usuario::select('id_usuario','nombre','apellido_paterno','apellido_materno')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('fk_cat_rol','3')->orderBy('t_persona.apellido_paterno','asc')->get();
       return $consulta;
    }
    private function lista_materias(){
       $consulta = Materias::orderBy('nombre_materia','asc')->get();
       return $consulta;
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
        $consulta = Horarios::select('id_horario','nombre_materia','nombre_carrera','lunes','martes','miercoles','jueves','viernes','grupo','t_horario.semestre','t_persona.nombre','t_persona.apellido_paterno','t_persona.apellido_materno')->join('t_materia','t_horario.fk_materia','t_materia.id_materia')->join('t_carrera','t_horario.fk_carrera','t_carrera.id_carrera')->join('t_usuario','t_horario.fk_usuario','t_usuario.id_usuario')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('fk_ciclo_escolar',$ciclo->id_ciclo_escolar)->get();
        return view('layouts/direccion/horarios', compact('titulo','infoUsuario','consulta'));
    }
    public function agregar_horario(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Añadir horario';
        $infoUsuario = $this->datos_sesion();
        $carreras = $this->lista_carreras();
        $docentes = $this->lista_docentes();
        $materias = $this->lista_materias();
        return view('layouts/direccion/crearHorario', compact('titulo','infoUsuario','carreras','docentes','materias'));
    }
}
