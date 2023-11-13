@extends('plantilla')
@section('contenido')



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded border-0 rounded-4">
                <div class="card-title">
                    <h1 class="mt-3 display-5">Panel de control</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('f1')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-arrow-up fa-6x mb-1"></i>
                                        <h1>Carga de archivos F1</h1>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('usuarios')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-users-rectangle fa-6x mb-1"></i>
                                    <h1>Usuarios</h1>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('materia')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-contract fa-6x mb-1"></i>
                                    <p>Asignacion de materias</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('listado')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
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