@extends('plantilla')
@section('contenido')
<div class="container mt-4">
    <div class="row justify-content-around">
        <div class="col-12 text-center">
            <h1 class="display-5">Agregar Usuario</h1>
            <hr>
        </div>
        <div class="col-md-10">
            <div class="text-end">
                <a href="{{route('usuarios')}}" class="btn btn-outline-danger btn-sm mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-md-2">

        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control form-control-sm" id="nombres" name="nombres" placeholder="Nombre(s)">
                <label for="usuario" class="form-label"><i class="fa-solid fa-user me-2"></i>Nombre(s)</label>
            </div>
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control form-control-sm" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno">
                <label for="apellido_materno" class="form-label"><i class="fa-solid fa-user me-2"></i>Apellido Materno</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control form-control-sm" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno">
                <label for="apellido_paterno" class="form-label"><i class="fa-solid fa-user me-2"></i>Apellido Paterno</label>
            </div>
            <div class="form-floating mb-3 ">
                <select name="roll" id="roll" class="form-control form-control-sm">
                    <option value=""></option>
                </select>
                <label for="usuario" class="form-label"><i class="fa-solid fa-user me-2"></i>Puesto de Escuela</label>
            </div>
        </div>
    </div>
</div>
@endsection('contenido')
