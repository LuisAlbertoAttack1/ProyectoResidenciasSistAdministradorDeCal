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
use RealRashid\SweetAlert\Facades\Alert;

class HorariosController extends Controller{
    private function lista_carreras(){
        $consulta = Carrera::where('id_carrera','!=','0')->get();
        return $consulta;
    }
    private function validar_sesion(){
        return !Auth::user() || Auth::user()->fk_cat_rol == 3;
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

    public function crear_horario(){
        $horario = new Horarios();
        request()->validate([
            'grupo'=>'required',
            'carrera'=>'required',
            'semestre'=>'required',
            'materia'=>'required',
            'docente'=>'required'
        ]);
        $horario->fk_materia = request()->materia;
        $horario->lunes = request()->hora_inicio1.'-'.request()->hora_fin1;
        $horario->martes = request()->hora_inicio2.'-'.request()->hora_fin2;
        $horario->miercoles = request()->hora_inicio3.'-'.request()->hora_fin3;
        $horario->jueves = request()->hora_inicio4.'-'.request()->hora_fin4;
        $horario->viernes = request()->hora_inicio5.'-'.request()->hora_fin5;
        $horario->semestre = request()->semestre; 
        $horario->fk_ciclo_escolar = 9;
        $horario->grupo = request()->grupo;
        $horario->fk_carrera = request()->carrera;
        $horario->fk_usuario = request()->docente;
        $horario->save();
        Alert::success('Proceso completado', 'Materia añadida con exito!');
        return redirect()->route('horarios.agregar');
    }

    public function eliminar_horario(Horarios $horario){
        $horarios =  new Horarios();
        $horarios->where('id_horario',$horario->id_horario)->delete();
        Alert::success('Proceso completado', 'Horario eliminado con exito!');
        return redirect()->route('horarios.lista');
    }

    public function precargar_horario(Horarios $horario){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Editar horario';
        $info_hr = $horario;
        $infoUsuario = $this->datos_sesion();
        $carreras = $this->lista_carreras();
        $docentes = $this->lista_docentes();
        $materias = $this->lista_materias();
        return view('layouts/direccion/editarHorario', compact('titulo','infoUsuario','carreras','docentes','materias','info_hr'));                
    }
}
