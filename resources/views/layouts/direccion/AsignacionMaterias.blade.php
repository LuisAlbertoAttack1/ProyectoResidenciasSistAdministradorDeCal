@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-around mt-5">
        <h1 class="display-6 mb-4"><b><i class="fa-solid fa-file-contract me-2 text-verde2"></i>Asignacion De Materias</b></h1>
        <hr class="text-verde">
        <div class="row justify-content-around">
            <div class="col-md-2 align-self-center">
                <img src="{{ asset('img/logocbt3.webp') }}" class="mx-auto d-block img-fluid" alt="Logo">
            </div>
            <div class="col-md-8 align-self-center">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control form-control-sm" id="nombres" name="nombres"
                                placeholder="Nombre(s)">
                            <label for="usuario" class="form-label"> <i class="fa-solid fa-book text-verde2"></i> Nombre De Materia</label>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="form-floating mb-3">
                            <select name="roll" id="roll" class="form-control form-control-sm">
                                <option value=""></option>
                            </select>
                            <label for="usuario" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip text-verde2"></i> Carrera</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select name="roll" id="roll" class="form-control form-control-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label for="usuario" class="form-label"><i class="fa-solid fa-business-time text-verde2"></i> Horas Por Cursar</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control form-control-sm" id="nombres" name="nombres"
                                placeholder="Nombre(s)">
                            <label for="usuario" class="form-label"> <i class="fa-solid fa-calendar-plus text-verde2"></i> Creditos</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select name="roll" id="roll" class="form-control form-control-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <label for="usuario" class="form-label"><i class="fa-solid fa-user text-verde2"></i> Semestre</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <hr class="text-verde">
                    </div>
                    <div class="col-5">
                        <a href="{{ route('editarAsignacionMaterias') }}" class="btn btn-outline-success mb-3 w-100"><i class="fa-solid fa-address-book"></i> Registrar</a>
                    </div>
                    <div class="col-5">
                        <a href="{{ route('panel') }}" class="btn btn-outline-danger mb-3 w-100"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('contenido')