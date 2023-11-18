@extends('plantilla')
@section('contenido')
<div class="container mt-4">
    <div class="row justify-content-center mt-5">
<<<<<<< HEAD
        <div class="col-12 mt-4">
            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded rounded-4 border-0">
                <h1 class="">Panel De Control</h1>
                <hr>
                <h6>Descripcion Descripcion Descripcion Descripcion Descripcion</h6>
                <h6>Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion</h6>
                <h6>Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion</h6>
                <div class="card-body">

                        {{-- contenido funcional --}}
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <a href="{{route('f1')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-arrow-up fa-6x mb-1 mb-3" style="color:#157f1f"></i>
                                        <h6 class="ColorTextoPanelCt">Carga De Archivos F1</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('usuarios')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-users-rectangle fa-6x mb-1 mb-3" style="color:#157f1f"></i>
                                    <h6 class="ColorTextoPanelCt">Usuarios</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('materia')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-contract fa-6x mb-1 mb-3" style="color:#157f1f"></i>
                                    <h6 class="ColorTextoPanelCt">Asignacion De Materias</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('listado')}}" class="card border-0 rounded-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-list-check fa-6x mb-3" style="color:#157f1f"></i>
                                    <h6 class="ColorTextoPanelCt">Aprobados Y Reprobados</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- contenido funcional --}}



=======
        <div class="col-12 mt-4 mb-3">
            <h1 class="display-6 text-verde"><b><i class="fa-solid fa-school-flag me-2"></i>Funciones Subdireccion</b></h1>
            <div class="row mt-4">
                <hr class="text-success mb-5">
                <div class="col-md-3">
                    <a href="{{route('f1')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-file-arrow-up fa-6x mb-1 mb-3"></i>
                                <h6>Carga De Archivos F1</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('usuarios')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-users-rectangle fa-6x mb-1 mb-3"></i>
                            <h6>Usuarios</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('materia')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-file-contract fa-6x mb-1 mb-3"></i>
                            <h6>Asignacion De Materias</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('listado')}}" class="card shadow card-panel mb-3">
                        <div class="card-body text-center mt-3 mb-2">
                            <i class="fa-solid fa-list-check fa-6x mb-3"></i>
                            <h6>Aprobados Y Reprobados</h6>
                        </div>
                    </a>
>>>>>>> 9bedf84855550af87d1521f93ded0757e409bb88
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