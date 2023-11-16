@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <form method="POST" class="row justify-content-center" action="{{route('inicio.sesion')}}">
        @csrf 
        <div class="col-md-4">
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded rounded-4 border-0">
                <div class="card-body">
                    <div class="row justify-content-around">
                        <div class="col-md-11">
                            <img src="{{ asset('img/logocbt3.webp') }}" class="mx-auto d-block mb-3" alt="Logo" width="180px">
                            <h5 class="text-center mt-2 mb-3">Sistema De Administración De Calificaciones</h5>
                            @error('usuario')
                                <div class="h5 text-center text-danger" >
                                    <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                                </div>
                            @enderror
                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control form-control-sm" id="usuario" name="usuario" placeholder="usuario">
                                <label for="usuario" class="form-label"><i class="fa-solid fa-user me-2"></i>Usuario</label>
                            </div>
                            <div class="form-floating mb-3 ">
                                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="password">
                                <label for="password" class="form-label"><i class="fa-solid fa-lock me-2"></i>Contraseña</label>
                            </div>
                            <button type="submit" class="btn btn-success w-100 mb-4">Ingresar</button>                                              
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </form>
</div>
@endsection('contenido')