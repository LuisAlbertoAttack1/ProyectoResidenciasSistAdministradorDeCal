@extends('plantilla')
@section('contenido')



<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-12 mt-4">
            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded rounded-4 border-0">
                <h1 class="">Panel De Control</h1>
                <hr>
                <h6>Descripcion Descripcion Descripcion Descripcion Descripcion</h6>
                <h6>Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion</h6>
                <h6>Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion</h6>
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <a href="{{route('f1')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-arrow-up fa-6x mb-1 mb-3"></i>
                                        <h6>Carga De Archivos F1</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('usuarios')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-users-rectangle fa-6x mb-1 mb-3"></i>
                                    <h6>Usuarios</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('materia')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-contract fa-6x mb-1 mb-3"></i>
                                    <h6>Asignacion De Materias</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('listado')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-list-check fa-6x mb-3"></i>
                                    <h6>Aprobados Y Reprobados</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('contenido')