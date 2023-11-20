<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DireccionController extends Controller
{

    private function datos_sesion(){
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return $infoUsuario;        
    }

    private function tipo_rol(){
        $consulta = Rol::all();
        return $consulta;
    }

    public function usuarios(){
        if(Auth::user()->fk_cat_rol != 1){
            return redirect('/');
        }
        $titulo = 'Listado de usuarios';
        $infoUsuario = $this->datos_sesion();
        $consulta = Usuario::select('id_usuario','usuario','nombre','apellido_paterno','apellido_materno','t_cat_rol.rol')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->get();
        return view('layouts/direccion/usuarios', compact('titulo','infoUsuario','consulta'));
    }
    public function agregar_usuario(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Agregar usuario';
        $infoUsuario = $this->datos_sesion();
        $roles = $this->tipo_rol();
        return view('layouts/direccion/addUser', compact('titulo','infoUsuario','roles'));
    }
    public function asignacion_materia(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Inicio';
        $infoUsuario = $this->datos_sesion();
        return view('layouts/direccion/AsignacionMaterias', compact('titulo','infoUsuario'));
    }
    public function editar_asignacion_materias(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $titulo = 'Inicio';
        $infoUsuario = $this->datos_sesion();
        return view('layouts/direccion/EditarAsignacionMat', compact('titulo','infoUsuario'));
    }
    public function Aprobados_y_Reprobados(){
        if(!Auth::user()){
            return redirect('/login');
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
            'password' => 'required|min:8|max:30',
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
            return redirect()->route('usuarios');
        }
    }

    public function precargar_usuario($usuario){
        if(Auth::user()->fk_cat_rol != 1){
            return redirect('/');
        }
        $titulo = 'Editar usuario';
        $infoUsuario = $this->datos_sesion();
        $roles = $this->tipo_rol();
        $consulta = $consulta = Usuario::select('id_usuario','fk_persona','usuario','nombre','apellido_paterno','apellido_materno','fk_cat_rol')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->where('id_usuario',$usuario)->first();
        return view('layouts/direccion/editUser', compact('titulo','infoUsuario','consulta','roles'));
    }

    public function editar_usuario(Persona $persona){
        request()->validate([
            'usuario' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'rol' => 'required',
        ]); 

        function actualizar($persona,$user){
            $persona->nombre = request()->nombre;
            $persona->apellido_paterno = request()->apellido_paterno;
            $persona->apellido_materno = request()->apellido_materno;
            $persona->save();            
            $user->usuario = request()->usuario;
            $user->fk_cat_rol = request()->rol;
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
                return redirect()->route('usuarios');
            }
        }else{
            actualizar($persona,$user);
            return redirect()->route('usuarios');
        }
    }

    public function editar_password(Usuario $usuario){
        if(!Auth::user()){
            return redirect('/login');
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
            'password_confirmacion' => 'required|min:8|max:15',

        ]); 
        if(request()->password_nuevo == request()->password_confirmacion){
            if(Hash::check(request()->password_actual, $usuario->password)){
                $usuario->password = Hash::make(request()->password_nuevo);
                $usuario->save();
                //alert()->success('Actualizacion completada','Se ha cambiado la contraseña de manera correcta.');
                return redirect()->route('usuarios');
                //return redirect()->to(route('usuarios'))->with('Actualizacion de contraseña completada', 'Aceptar');
            }else{
                throw ValidationException::withMessages([
                    'password_actual' => 'Contraseña actual no valida!'
                ]); 
            }
        }else{
            throw ValidationException::withMessages([
                'password_confirmacion' => 'Las contraseñas no son identicas!'
            ]);    
        } 
    }
}
