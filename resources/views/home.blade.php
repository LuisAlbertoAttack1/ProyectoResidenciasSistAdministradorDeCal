@extends('plantilla')
@section('contenido')
    {{-- CONTENIDO DE CARRUSEL  --}}
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}

                <img src="{{ asset('img/ImgCarrusel/ImgCarrusel1.webp') }}" class="img-fluid" alt="">

                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
            </div>
            <div class="carousel-item">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}

                <img src="{{ asset('img/ImgCarrusel/ImgCarrusel1.webp') }}" class="img-fluid" alt="">

                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
            </div>
            <div class="carousel-item">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}

                <img src="{{ asset('img/ImgCarrusel/ImgCarrusel1.webp') }}" class="img-fluid" alt="">

                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
            </div>
            <div class="carousel-item">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}

                <img src="{{ asset('img/ImgCarrusel/ImgCarrusel1.webp') }}" class="img-fluid" alt="">

                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- CONTENIDO DE CARRUSEL --}}
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-10">
            <h1>Bienvenid@ {{$infoUsuario->nombre }} {{$infoUsuario->apellido_paterno}} {{$infoUsuario->apellido_materno}}</h1>
        </div>
    </div>
</div>
@endsection('contenido')