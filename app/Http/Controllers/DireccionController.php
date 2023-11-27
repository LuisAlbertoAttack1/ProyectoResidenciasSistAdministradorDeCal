<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Materias;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DireccionController extends Controller{
    //funcion para validar si existe una sesion y si existe corresponda al rol adecuado
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
    //funcion para obtener el listado de roles
    private function tipo_rol(){
        $consulta = Rol::all();
        return $consulta;
    }

    private function lista_carreras(){
        $consulta = Carrera::all();
        return $consulta;
    }

    public function usuarios(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Listado de usuarios';
        $infoUsuario = $this->datos_sesion();
        $consulta = Usuario::select('id_usuario','usuario','nombre','apellido_paterno','apellido_materno','t_cat_rol.rol','estado')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->get();
        return view('layouts/direccion/usuarios', compact('titulo','infoUsuario','consulta'));
    }
    public function agregar_usuario(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Agregar usuario';
        $infoUsuario = $this->datos_sesion();
        $roles = $this->tipo_rol();
        return view('layouts/direccion/addUser', compact('titulo','infoUsuario','roles'));
    }
    public function asignacion_materia(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Inicio';
        $infoUsuario = $this->datos_sesion();
        return view('layouts/direccion/AsignacionMaterias', compact('titulo','infoUsuario'));
    }
    public function editar_asignacion_materias(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Inicio';
        $infoUsuario = $this->datos_sesion();
        return view('layouts/direccion/EditarAsignacionMat', compact('titulo','infoUsuario'));
    }
    public function Aprobados_y_Reprobados(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Inicio';
        $infoUsuario = $this->datos_sesion();
        return view('layouts/direccion/Aprobadosyreprobados', compact('titulo','infoUsuario'));
    }


    public function add_usuario(){
        $usuario = new Usuario();
        $persona = new Persona();
        request()->validate([
            'usuario' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&.+=!])(?!.*\s).{8,}$/',
            'rol' => 'required',
        ]); 

        $consulta = Usuario::where('usuario',request()->usuario)->first();
        if($consulta){
            throw ValidationException::withMessages([
                'usuario' => 'Nombre de usuario ya registrado!'
            ]);
        }else{
            $persona->nombre = request()->nombre;
            $persona->apellido_paterno = request()->apellido_paterno;
            $persona->apellido_materno = request()->apellido_materno;
            $persona->save();    
            $usuario->usuario =  request()->usuario;
            $usuario->password =  Hash::make(request()->password);
            $usuario->fk_cat_rol =  request()->rol;
            $usuario->fk_persona =  $persona->id_persona;
            $usuario->save();
            Alert::success('Proceso finalizado', 'Se ha añadido el usuario con exito!');
            return redirect()->route('usuarios');
        }
    }

    public function precargar_usuario($usuario){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Editar usuario';
        $infoUsuario = $this->datos_sesion();
        $roles = $this->tipo_rol();
        $consulta = Usuario::select('id_usuario','fk_persona','usuario','nombre','apellido_paterno','apellido_materno','fk_cat_rol','estado')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->where('id_usuario',$usuario)->first();
        return view('layouts/direccion/editUser', compact('titulo','infoUsuario','consulta','roles'));
    }

    public function editar_usuario(Persona $persona){
        request()->validate([
            'usuario' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'rol' => 'required',
            'estado' => 'required',
        ]); 

        function actualizar($persona,$user){
            $persona->nombre = request()->nombre;
            $persona->apellido_paterno = request()->apellido_paterno;
            $persona->apellido_materno = request()->apellido_materno;
            $persona->save();            
            $user->usuario = request()->usuario;
            $user->fk_cat_rol = request()->rol;
            $user->estado = request()->estado;
            $user->save();
        }
        
        $consulta = Usuario::where('usuario','id_usuario',request()->usuario)->first();
        $user = Usuario::find(request()->id_user);
        if($consulta){
            if($consulta->id_usuario != request()->id_user){
                throw ValidationException::withMessages([
                    'usuario' => 'Nombre de usuario ya registrado!'
                ]);
            }else{
                actualizar($persona,$user);
            }
        }else{
            actualizar($persona,$user);
        }
        Alert::success('Edicion finalizada', 'Actualizacion de datos con exito!');
        return redirect()->route('usuarios');
    }

    public function editar_password(Usuario $usuario){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Actualizar contraseña usuario';
        $infoUsuario = $this->datos_sesion();
        $consulta = array();
        $consulta['id_usuario'] = $usuario->id_usuario;
        $consulta['usuario'] = $usuario->usuario;
        return view('layouts/direccion/editPass', compact('titulo','infoUsuario','consulta'));        
    }

    public function edit_password(Usuario $usuario){
        request()->validate([
            'password_actual' => 'required',
            'password_nuevo' => 'required|min:8|max:15',
            'password_confirmacion' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&.+=!])(?!.*\s).{8,}$/',

        ]); 
        if(request()->password_nuevo == request()->password_confirmacion){
            if(Hash::check(request()->password_actual, Auth::user()->password)){
                $usuario->password = Hash::make(request()->password_nuevo);
                $usuario->save();
                return redirect()->route('usuarios');
            }else{
                throw ValidationException::withMessages([
                    'password_actual' => 'Contraseña de usuario no valida!'
                ]); 
            }
        }else{
            throw ValidationException::withMessages([
                'password_confirmacion' => 'Las contraseñas no son identicas!'
            ]);    
        } 
        Alert::success('Contraseña actualizada', 'Actualizacion de contraseña con exito!');
        return redirect()->route('usuarios');
    }

    public function deshabilitar_usuario(Usuario $usuario){
        $usuario->estado = $usuario->estado == 1 || $usuario->estado == 2 ? 0 : 2;
        $usuario->save();
        Alert::success('Proceso completado', 'Estado de la cuenta actualizado con exito!');
        return redirect()->route('usuarios');        
    }

    public function lista_materias(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Listado de materias';
        $infoUsuario = $this->datos_sesion();
        $consulta = Materias::select('id_materia','nombre_materia','t_carrera.nombre_carrera','horas','creditos','semestre','t_materia.estado')->join('t_carrera','t_materia.fk_carrera','t_carrera.id_carrera')->get();
        return view('layouts/direccion/listaMaterias', compact('titulo','infoUsuario','consulta'));        
    }

    public function agregar_materia(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Agregar materia';
        $infoUsuario = $this->datos_sesion();
        $carreras = $this->lista_carreras();
        return view('layouts/direccion/crearMateria', compact('titulo','infoUsuario','carreras'));        
    }

    public function crear_materia(){
        $materia = new Materias();
        request()->validate([
            'nombre_materia'=>'required',
            'carrera'=>'required',
            'horas'=>'required',
            'creditos'=>'required|min:1|numeric',
            'semestre'=>'required',
        ]);
        $materia->nombre_materia = request()->nombre_materia;
        $materia->fk_carrera = request()->carrera;
        $materia->horas = request()->horas;
        $materia->creditos = request()->creditos;
        $materia->semestre = request()->semestre; 
        $materia->save();
        Alert::success('Proceso completado', 'Materia añadida con exito!');
        return redirect()->route('listado.materia');
    }

    public function precargar_materia($materia){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Editar materia';
        $infoUsuario = $this->datos_sesion();
        $carreras = $this->lista_carreras();
        $consulta = Materias::where('id_materia',$materia)->first();
        return view('layouts/direccion/editMateria', compact('titulo','infoUsuario','consulta','carreras'));        
    }

    public function actualizar_usuario(Materias $materia){
        request()->validate([
            'nombre_materia'=>'required',
            'carrera'=>'required',
            'horas'=>'required',
            'creditos'=>'required|min:1|numeric',
            'semestre'=>'required',
            'estado'=>'required',
        ]);
        $materia->nombre_materia = request()->nombre_materia;
        $materia->fk_carrera = request()->carrera;
        $materia->horas = request()->horas;
        $materia->creditos = request()->creditos;
        $materia->semestre = request()->semestre; 
        $materia->estado = request()->estado; 
        $materia->save();
        Alert::success('Proceso completado', 'Materia actualizada con exito!');
        return redirect()->route('listado.materia');
    }

    public function listado_docente(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Listado de docentes';
        $infoUsuario = $this->datos_sesion();
        $consulta = Docente::join('t_persona','t_docente.fk_persona','t_persona.id_persona')->get();
        return view('layouts/direccion/listaDocente', compact('titulo','infoUsuario','consulta'));  
    }
}
