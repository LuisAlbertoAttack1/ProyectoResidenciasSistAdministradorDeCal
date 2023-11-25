@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col-12">
            <h1 class="display-6"><i class="fa-solid fa-user-shield me-2 text-verde2"></i>Actualizar contraseña de usuario</h1>
            <hr class="text-verde">
        </div>
    </div>
    <form method="POST" class="row justify-content-center mt-3" action="{{route('password.edit',$consulta['id_usuario'])}}">
        @csrf 
        @method('put')
        <div class="col-md-4 align-self-center">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control form-control-sm" id="usuario" name="usuario"
                    placeholder="Nombre de Usuario" value="{{$consulta['usuario']}}" disabled>
                <label for="usuario" class="form-label"><i class="fa-solid fa-clipboard-user me-2 text-verde2"></i>Usuario</label>
            </div>
            @error('password_actual')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3 ">
                <input type="password" class="form-control form-control-sm" id="password_actual" name="password_actual"
                    placeholder="Contraseña">
                <label for="password_actual" class="form-label"><i class="fa-solid fa-user-shield me-2 text-verde2"></i>Contraseña</label>
            </div>
        </div>
        <div class="col-md-4 align-self-center">
            @error('password_nuevo')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3 ">
                <input type="password" class="form-control form-control-sm" id="password_nuevo" name="password_nuevo"
                    placeholder="Contraseña">
                <label for="password_nuevo" class="form-label"><i class="fa-solid fa-lock me-2 text-verde2"></i>Contraseña nueva</label>
            </div>
            @error('password_confirmacion')
            <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
            @enderror 
            <div class="form-floating mb-3 ">
                <input type="password" class="form-control form-control-sm" id="password_confirmacion" name="password_confirmacion"
                    placeholder="Contraseña">
                <label for="password_confirmacion" class="form-label"><i class="fa-solid fa-key me-2 text-verde2"></i>Confirmacion contraseña</label>
            </div>
        </div>
        <div class="col-md-8 text-end">
            <a href="{{ route('usuarios') }}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
            <button class="btn btn-outline-success mb-3"><i class="fa-solid fa-user-check me-2" type="submit"></i>Actualizar Usuario</button>
        </div>
    </form>
</div>
@error('correcto')
    <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> </p>
    <script>
        Swal.fire({
        title: "Correcto",
        text: "Contraseña de usuario actualizada con exito!",
        icon: "success",
        allowEscapeKey: false,
        showCancelButton: false,
        allowEnterKey: false,
        allowOutsideClick: false,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location="usuarios";
            }
        });
    </script>
@enderror
@endsection('contenido')
