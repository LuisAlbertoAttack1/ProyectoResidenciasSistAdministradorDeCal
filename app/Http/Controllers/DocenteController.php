<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\CicloEscolar;
use App\Models\Domicilio;
use App\Models\Horarios;
use App\Models\Materias;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Usuario;
use App\Models\FormatoUno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DocenteController extends Controller
{
     //funcion para validar si existe una sesion y si existe corresponda al rol adecuado
     private function validar_sesion(){
        return !Auth::user() || Auth::user()->fk_cat_rol != 3;
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
        $usuario =  Auth::user()->id_usuario;
        $infoUsuario = $this->datos_sesion();
        $ciclo = CicloEscolar::select('id_ciclo_escolar')->orderBy('id_ciclo_escolar','desc')->first();
        $consulta = Horarios::select('id_horario','nombre_materia','nombre_carrera','lunes','martes','miercoles','jueves','viernes','grupo','t_horario.semestre','t_persona.nombre','t_persona.apellido_paterno','t_persona.apellido_materno')->join('t_materia','t_horario.fk_materia','t_materia.id_materia')->join('t_carrera','t_horario.fk_carrera','t_carrera.id_carrera')->join('t_usuario','t_horario.fk_usuario','t_usuario.id_usuario')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('fk_ciclo_escolar',$ciclo->id_ciclo_escolar)->where('fk_usuario',$usuario)->get();
        return view('layouts/docente/materias', compact('titulo','infoUsuario','consulta'));
    }

    public function cargar_horario(Horarios $horario){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $consulta_f1 = FormatoUno::where('fk_horario',$horario->id_horario)->first();
        if($consulta_f1){
            Alert::error('Proceso finalizado', 'Ya se cargaron las calificaciones para esta materia!');
            return redirect()->route('docente.list'); 
        }else{
            $titulo = 'Listado de alumno';
            $infoUsuario = $this->datos_sesion();
            $consulta = Horarios::select('id_horario','nombre_materia','nombre_carrera','lunes','martes','miercoles','jueves','viernes','grupo','t_horario.semestre','t_persona.nombre','t_persona.apellido_paterno','t_persona.apellido_materno')->join('t_materia','t_horario.fk_materia','t_materia.id_materia')->join('t_carrera','t_horario.fk_carrera','t_carrera.id_carrera')->join('t_usuario','t_horario.fk_usuario','t_usuario.id_usuario')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('t_horario.id_horario',$horario->id_horario)->first();
            return view('layouts/docente/cargarCalificacion', compact('titulo','infoUsuario','consulta'));
        }
    }

    public function direccion_docente(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Dirección';
        $infoUsuario = $this->datos_sesion();
        $usuario =  Auth::user()->id_usuario;
        $consulta = Domicilio::select('id_domicilio','domicilio','municipio','poblado')->where('fk_usuario', $usuario)->first();
        if(!$consulta){
            $consulta = ['id_domicilio'=> $usuario,'domicilio'=>'','municipio'=>'','poblado'=>''];
        }
        return view('layouts/docente/direccion', compact('titulo','infoUsuario','consulta'));
    }

    public function cargar_calificaciones(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $insercion[] = array();
        for($i = 1; $i <= request()->cantidad_alumnos; $i++){
            $insercion[($i-1)]['fk_horario'] = request()->id_horario;
            $insercion[($i-1)]['falta1'] = request()->input('falta1_'.$i);
            $insercion[($i-1)]['falta2'] = request()->input('falta2_'.$i);
            $insercion[($i-1)]['falta3'] = request()->input('falta3_'.$i);
            $insercion[($i-1)]['falta_total'] = request()->input('faltaTotal_'.$i);
            $insercion[($i-1)]['cal1'] = request()->input('evaluacion1_'.$i);
            $insercion[($i-1)]['cal2'] = request()->input('evaluacion2_'.$i);
            $insercion[($i-1)]['cal3'] = request()->input('evaluacion3_'.$i);
            $insercion[($i-1)]['cal_sum'] = request()->input('evaluacion1_'.$i) + request()->input('evaluacion2_'.$i) + request()->input('evaluacion3_'.$i);
            $insercion[($i-1)]['cal_final'] = request()->input('evaluacionTotal_'.$i);
            $insercion[($i-1)]['nom_alumno'] = request()->input('nombre_alumno'.$i);
            $insercion[($i-1)]['sexo'] = request()->input('sexo_alumno'.$i);
        }
        FormatoUno::insert($insercion);
        Alert::success('Proceso finalizado', 'Se han añadido las calificaciones con exito!');
        return redirect()->route('docente.list');
    }

    public function agregar_direccion(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $domicilio = new Domicilio();
        request()->validate([
            'domicilio'=>'required',
            'municipio'=>'required',
            'poblado'=>'required'
        ]);
        $usuario =  Auth::user()->id_usuario;
        $consulta = Domicilio::where('fk_usuario', $usuario)->first();
        if($consulta){
            Domicilio::where('fk_usuario',$usuario)->update(['domicilio'=> request()->domicilio,'municipio'=>request()->municipio,'poblado'=>request()->poblado]);
        }else{
            $domicilio->domicilio = request()->domicilio;
            $domicilio->municipio = request()->municipio;
            $domicilio->poblado = request()->poblado;
            $domicilio->fk_usuario = $usuario;
            $domicilio->save();
        }
        Alert::success('Proceso finalizado', 'Se han añadido la nueva direccion con exito!');
        return redirect()->route('panel');
    }
}
