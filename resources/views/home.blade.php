@extends('plantilla')
@section('contenido')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-10">
            <h1>Bienvenid@ {{$infoUsuario->nombre }} {{$infoUsuario->apellido_paterno}} {{$infoUsuario->apellido_materno}}</h1>
        </div>
    </div>
</div>
@endsection('contenido')