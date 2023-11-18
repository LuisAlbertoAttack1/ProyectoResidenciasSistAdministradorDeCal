@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col">
            <h1 class="display-5 text-center mt-4">Asignacion De Materias</h1>
            <hr>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">

                    <div class="col-md-6 align-self-center">
                        <img src="{{ asset('img/logocbt3.webp') }}" class="mx-auto d-block  img-fluid ms-5" alt="Logo">
                    </div>

                </div>
                <div class="col">

                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control form-control-sm" id="nombres" name="nombres"
                            placeholder="Nombre(s)">
                        <label for="usuario" class="form-label"> <i class="fa-solid fa-book" style="color: #000000;"></i> Nombre De Materia</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="roll" id="roll" class="form-control form-control-sm">
                            <option value=""></option>
                        </select>
                        <label for="usuario" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip" style="color: #000000;"></i> Carrera</label>
                    </div>



                    <div class="form-floating mb-3">
                        <select name="roll" id="roll" class="form-control form-control-sm">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="usuario" class="form-label"><i class="fa-solid fa-business-time" style="color: #000000;"></i> Horas Por Cursar</label>
                    </div>     


                </div>
                <div class="col">
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control form-control-sm" id="nombres" name="nombres"
                            placeholder="Nombre(s)">
                        <label for="usuario" class="form-label"> <i class="fa-solid fa-calendar-plus" style="color: #000000;"></i> Creditos</label>
                    </div>


                    <div class="form-floating mb-3">
                        <select name="roll" id="roll" class="form-control form-control-sm">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <label for="usuario" class="form-label"><i class="fa-solid fa-user" style="color: #000000;"></i> Semestre</label>
                    </div>     


                    <div class="d-grid gap-2 col-12 mx-auto">
                        <a href="{{ route('editarAsignacionMaterias') }}" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-address-book"></i> Registrar</a>
                        <a href="{{ route('usuarios') }}" class="btn btn-outline-danger mb-3"><i
                                class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                    </div>


                </div>
              </div>

        </div>
    </div>
</div>
@endsection('contenido')