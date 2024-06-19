@extends('plantilla')
@section('contenido')
<div class="container mt-1">
    <div class="row justify-content-center mt-5">
        <div class="col-12 mb-3">
            <h1 class="display-6"><b><i class="fa-solid fa-school-flag me-2 text-verde2"></i>Funciones Doncente</b></h1>
            <div class="row mt-4">
                <hr class="text-success mb-5">
                <div class="col-md-3">
                    <a href="{{route('docente.list')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-book fa-6x mb-3"></i>
                            <h6>Calificaciones Materias</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('docente.info')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-regular fa-address-book fa-6x mb-3"></i>
                            <h6>Dirección</h6>
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