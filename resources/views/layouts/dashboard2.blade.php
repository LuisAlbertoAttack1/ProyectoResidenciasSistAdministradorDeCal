@extends('plantilla')
@section('contenido')
<div class="container mt-1">
    <div class="row justify-content-center mt-5">
        <div class="col-12 mb-3">
            <h1 class="display-6"><b><i class="fa-solid fa-school me-2 text-verde2"></i>Funciones Servicios Escolares</b></h1>
            <div class="row mt-4">
                <hr class="text-success mb-5">
                <div class="col-md-3">
                    <a href="{{route('usuarios')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-users-rectangle fa-6x mb-1 mb-3"></i>
                            <h6>Usuarios</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('lista.docente')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-user-tie fa-6x mb-1 mb-3"></i>
                            <h6>Docentes</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('listado.materia')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-book fa-6x mb-3"></i>
                            <h6>Materias</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('horarios.lista')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-regular fa-clock fa-6x mb-1 mb-3"></i>
                            <h6>Asignacion de Horarios</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('listado')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-list-check fa-6x mb-3"></i>
                            <h6>Calificaciones</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('f1')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-file-arrow-up fa-6x mb-1 mb-3"></i>
                            <h6>Carga De Archivos F1</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 text-end">
            <hr class="text-success">
            <h4 class="lead text-verde"><i class="fa-solid fa-screwdriver-wrench me-2 fs-6"></i>Panel De Control</h4>
        </div>
    </div>
</div>
@endsection('contenido')