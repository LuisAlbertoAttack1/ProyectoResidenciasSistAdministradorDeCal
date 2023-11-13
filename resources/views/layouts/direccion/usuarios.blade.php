@extends('plantilla')
@section('contenido')
<div class="container mt-4">
    <div class="row justify-content-around">
        <div class="col-12 text-center">
            <h1 class="display-5">Listado de usuarios</h1>
            <hr>
        </div>
        <div class="col-md-10">
            <div class="text-end">
                <a href="{{route('agregar')}}" class="btn btn-outline-primary btn-sm mb-3"><i class="fa-solid fa-user-plus me-2"></i>Agregar Usuario</a>
                <a href="{{route('panel')}}" class="btn btn-outline-danger btn-sm mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
            </div>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="contenido_tabla">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">Ap. Paterno</th>
                            <th scope="col">Ap. Materno</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Act. contraseña</th>
                            <th scope="col">Deshabilitar</th>                            
                        </tr>
                    <thead>   
                    <tbody> 
                        @foreach($consulta as $usuario)
                            <tr>
                                <td>{{$usuario['usuario']}}</td>
                                <td>{{$usuario['nombre']}}</td>
                                <td>{{$usuario['apellido_paterno']}}</td>
                                <td>{{$usuario['apellido_materno']}}</td>
                                <td>{{$usuario['rol']}}</td>
                                <td><a href="{{$usuario['id_usuario']}}" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="{{$usuario['id_usuario']}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-unlock-keyhole"></i></a></td>
                                <td><a href="{{$usuario['id_usuario']}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-user-large-slash"></i></a></td>
                            </tr>
                        @endforeach                       
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
</div>
@endsection('contenido')
