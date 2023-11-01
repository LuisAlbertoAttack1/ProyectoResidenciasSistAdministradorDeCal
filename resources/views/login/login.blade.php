@extends('plantilla')

    <div class="container">
        <div class="row">
            <div class="col">
                {{-- CONTENIDO --}}
                <div
                    class="card position-absolute top-50 start-50 translate-middle shadow-lg bg-body rounded rounded border-0 rounded-5">
                    <div class="card-body">
                        {{-- CONTENIDO CARD 2 VISTA --}}
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card border-0 colorTransparente">
                                    <div class="card-body">
                                        {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
                                        <img src="{{ asset('img/logocbt3.webp') }}" class="img-fluid"
                                            alt="">
                                        {{-- CONTENIDO DE IMG LOGO DE ESCUELA --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-0 colorTransparente">
                                    <div class="card-body">
                                        {{-- FUNCIONALIDAD --}}
                                        {{-- <form action="{{ route('logear') }}" method="post">
                                            @csrf
                                            @method('POST') --}}
                                            <h3 class="text-center mt-2">Sistema De Administración <br> De Calificaiones</h1>
                                                <h5 class="mt-2 mb-2">Usuario</h5>
                                                <input name="user" type="text" class="form-control text-center"
                                                    placeholder="Usuario" aria-label="Usuario"
                                                    aria-describedby="basic-addon1" required>
                                                <h5 class="mt-2 mb-2">Contraseña</h5>
                                                <input name="password" type="password" minlength="8" maxlength="8"
                                                    class="form-control text-center" placeholder="Contraseña"
                                                    aria-label="Contraseña" aria-describedby="basic-addon1" required>
                                                {{-- SECCION DE BOTON --}}
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button class="btn colorBotonLoginIngresar mt-4">Ingresar</button>
                                                </div>
                                                {{-- SECCION DE BOTON --}}
                                        {{-- </form> --}}
                                        {{-- FUNCIONALIDAD --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- CONTENIDO CARD 2 VISTA --}}

                    </div>
                </div>
                
                {{-- CONTENIDO --}}
            </div>
        </div>
    </div>

