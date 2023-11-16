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
                <img src="{{ asset('img/ImgCarrusel/ImgCarrusel2.webp') }}" class="img-fluid" alt="">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
            </div>
            <div class="carousel-item">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
                <img src="{{ asset('img/ImgCarrusel/ImgCarrusel3.webp') }}" class="img-fluid" alt="">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
            </div>
            <div class="carousel-item">
                {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
                <img src="{{ asset('img/ImgCarrusel/ImgCarrusel4.webp') }}" class="img-fluid" alt="">
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



    {{-- CONTENIDO DE TEXTO  --}}
    <div class="container">
        <div class="row">
            <div class="col">
                {{-- CONTENIDO --}}
                            {{-- CONTENIDO DE CARD --}}
                        <h2 class="text-center mt-4 mb-4 GosorDeLetra">Cbt 3 Sr Max Shein Heisler Chalco</h2>
                            {{-- CONTENIDO DE CARD --}}
                            <div class="row mt-4">
                                <div class="col-sm-6 mb-3 mb-sm-0 mt-2">

                                    <img src="{{ asset('img/FotoCbtEvento.webp') }}" class="mx-auto d-block mb-3 rounded-4" alt="Logo" width="550px">

                                </div>
                                <div class="col-sm-6 mt-3">

                                        <h5 class="mt-3">El Centro de Bachillerato Tecnológico Industrial y de Servicios No. 3 "Sr. Max Shein Heisler", también conocido como CBT 3, es una institución educativa de nivel técnico ubicada en Chalco, Estado de México.</h5>
                                        <h5 class="mt-2 text-center">Con más de 40 años de experiencia, el CBT 3 se ha consolidado como una de las mejores opciones para estudiar carreras técnicas en la región.</h5>

                                </div>
                              </div>
                            {{-- CONTENIDO DE CARD --}}
                {{-- CONTENIDO --}}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded rounded-4 border-0 mt-4">
                    <h2 class="text-center mt-2 mb-2">¿Qué carreras ofrece Cbt 3 Sr Max Shein Heisler Chalco ?</h2>
                    <div class="card-body">
                        {{-- CONTENIDO --}}
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                              <div class="card shadow p-3 mb-5 bg-body-tertiary rounded rounded-4 border-0">
                                <div class="card-body">
                                  <h5 class="card-title text-center">Técnico En Contabilidad</h5>
                                    <p>Los técnicos contables asisten a los contables mediante la recopilación, comprobación y análisis de información financiera y la preparación de informes.</p>
                                    <br>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card shadow p-3 mb-5 bg-body-tertiary rounded rounded-4 border-0">
                                <div class="card-body">
                                  <h5 class="card-title text-center">Técnico En Informática</h5>
                                    <p> El Técnico en Informática es capaz de desempeñarse en tareas de producción, diseño y mantenimiento de software en diversos tipos de proyectos de Sistemas de Información.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card shadow p-3 mb-5 bg-body-tertiary rounded rounded-4 border-0">
                                <div class="card-body">
                                  <h5 class="card-title text-center">Técnico En Diseño Asistido Por Computadora</h5>
                                    <p>La carrera de Técnico en Diseño Asistido por Computadora ofrece las competencias profesionales que permiten al estudiante realizar actividades dirigidas a ilustrar.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        {{-- CONTENIDO --}}

                    </div>
                </div>
                <h5>Los estudiantes del CBT 3 también tienen acceso a instalaciones y equipos de última generación, lo que les permite realizar prácticas y proyectos de alta calidad. Además, la institución cuenta con un cuerpo docente altamente capacitado y comprometido con la formación de los alumnos.</h5>
                <h5 class="mt-2">Otra ventaja importante de estudiar en el CBT 3 es la posibilidad de realizar prácticas profesionales en empresas y organizaciones de la región, lo que les permite a los estudiantes adquirir experiencia laboral y establecer contactos que pueden ser importantes para su futuro profesional.</h5>
            </div>
        </div>
    </div>
    <br><br><br><br>
    {{-- CONTENIDO DE TEXTO --}}

@endsection('contenido')