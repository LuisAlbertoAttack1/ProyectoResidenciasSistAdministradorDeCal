@extends('plantilla')
@section('contenido')
<div class="container mt-4 mb-5">
    <div class="row justify-content-around ">
        <div class="col-12">
            <h1 class="display-6"><b><i class="fa-regular fa-address-book text-verde2 me-2"></i>Dirección</b></h1>
        </div>
        <div class="col-md-12">
            <div class="text-end">
                <hr class="text-verde mb-4">
            </div>
            <form id="frm_act_direccion" method="post" action="{{route('docente.direct')}}" class="row justify-content-around">
            @csrf
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        @error('domicilio')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio" value="{{$consulta['domicilio']}}">
                            <label for="domicilio" class="form-label"><i class="fa-regular fa-address-book text-verde2"></i> Domicilio</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @error('poblado')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="poblado" id="poblado" placeholder="Poblado" value="{{$consulta['poblado']}}">
                            <label for="poblado" class="form-label"><i class="fa-solid fa-street-view text-verde2"></i> Poblado</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @error('municipio')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="municipio" id="grupo" placeholder="Municipio" value="{{$consulta['municipio']}}">
                            <label for="municipio" class="form-label"><i class="fa-solid fa-location-crosshairs text-verde2"></i> Municipio</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <a href="{{route('panel')}}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                <button type="submit" class="btn btn-outline-success mb-3"><i class="fa-regular fa-clock me-2"></i>Añadir horario</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection('contenido')
