@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col-12">
            <h1 class="display-6"><i class="fa-solid fa-user-plus me-2 text-verde2"></i>Agregar Usuario</h1>
            <hr class="text-verde">
        </div>
    </div>
    <form action="{{route('agregar.usuario')}}" method="POST" class="row justify-content-around mt-3" id="frm_agregar_usuario">
        @csrf
        <div class="d-none d-md-block col-md-2 align-self-center">
            <img src="{{ asset('img/logocbt3.webp') }}" class="mx-auto d-block mb-3 img-fluid" alt="Logo">
        </div>
        <div class="col-md-4 align-self-center">
            @error('nombre')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre"
                    placeholder="Nombre(s)" value="{{old('nombre')}}">
                <label for="nombre" class="form-label"><i class="fa-solid fa-signature me-2 text-verde2"></i>Nombre(s)</label>
            </div>
            @error('apellido_paterno')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3">
                <input type="text" class="form-control form-control-sm" id="apellido_paterno"
                    name="apellido_paterno" placeholder="Apellido Paterno" value="{{old('apellido_paterno')}}">
                <label for="apellido_paterno" class="form-label"><i class="fa-solid fa-pen me-2 text-verde2"></i>Apellido
                    Paterno</label>
            </div>
            @error('apellido_materno')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control form-control-sm" id="apellido_materno"
                    name="apellido_materno" placeholder="Apellido Materno" value="{{old('apellido_materno')}}">
                <label for="apellido_materno" class="form-label"><i class="fa-solid fa-feather me-2 text-verde2"></i>Apellido
                    Materno</label>
            </div>
        </div>
        <div class="col-md-4 align-self-center">
            @error('usuario')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control form-control-sm" id="usuario" name="usuario"
                    placeholder="Nombre de Usuario" value="{{old('usuario')}}">
                <label for="usuario" class="form-label"><i class="fa-solid fa-clipboard-user me-2 text-verde2"></i>Usuario</label>
            </div>
            @error('password')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3 ">
                <input type="password" class="form-control form-control-sm" id="password" name="password"
                    placeholder="Contraseña">
                <label for="password" class="form-label"><i class="fa-solid fa-user-shield me-2 text-verde2"></i>Contraseña</label>
            </div>
            @error('rol')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror
            <div class="form-floating mb-3">
                <select name="rol" id="rol" class="form-control form-control-sm">
                    <option value="">Seleccionar puesto</option>
                    @foreach($roles as $rol)
                    <option value="{{$rol->id_cat_rol}}">{{$rol->rol}}</option>
                    @endforeach
                </select>
                <label for="rol" class="form-label"><i class="fa-solid fa-book me-2 text-verde2"></i>Puesto de Escuela</label>
            </div>
        </div>
        <div class="col-md-11 text-end">
            <a href="{{ route('usuarios') }}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
            <button class="btn btn-outline-success mb-3"><i class="fa-solid fa-user-check me-2" type="submit"></i>Registrar Usuario</button>
        </div>
    </form>
</div>
@endsection('contenido')
