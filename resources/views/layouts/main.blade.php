@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-title text-center">
                    <h1 class="mt-3 display-5"><i class="fa-solid fa-gears me-2"></i>Panel de control</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('f1')}}" class="card mb-3">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-arrow-up fa-6x mb-1"></i>
                                    <p>Carga de archivos F1</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('usuarios')}}" class="card mb-3">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-users-rectangle fa-6x mb-1"></i>
                                    <p>Usuarios</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('materia')}}" class="card mb-3">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-contract fa-6x mb-1"></i>
                                    <p>Asignacion de materias</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('listado')}}" class="card mb-3">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-list-check fa-6x mb-1"></i>
                                    <p>Aprobados y reprobados</p>
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