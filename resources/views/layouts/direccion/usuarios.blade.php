@extends('plantilla')
@section('contenido')
<div class="container mt-4">
    <div class="row justify-content-around mt-5">
        <div class="col-12">
            <h1 class="display-6"><b><i class="fa-solid fa-users-rectangle text-verde2 me-2"></i>Listado de usuarios</b></h1>
        </div>
        <div class="col-md-12">
            <div class="text-end">
                <a href="{{route('panel')}}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                <a href="{{route('agregar')}}" class="btn btn-outline-success mb-3"><i class="fa-solid fa-user-plus me-2"></i>Agregar Usuario</a>
                <hr class="text-verde mb-4">
            </div>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="contenido_tabla">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center" scope="col">Usuario</th>
                            <th class="text-center" scope="col">Nombre(s)</th>
                            <th class="text-center" scope="col">Ap. Paterno</th>
                            <th class="text-center" scope="col">Ap. Materno</th>
                            <th class="text-center" scope="col">Puesto</th>
                            <th class="text-center" scope="col">Editar</th>
                            <th class="text-center" scope="col">Act. contraseña</th>
                            <th class="text-center" scope="col">Estado</th>                            
                        </tr>
                    <thead>   
                    <tbody> 
                        @foreach($consulta as $usuario)
                            <tr>
                                <td class="text-start">{{$usuario['usuario']}}</td>
                                <td>{{$usuario['nombre']}}</td>
                                <td>{{$usuario['apellido_paterno']}}</td>
                                <td>{{$usuario['apellido_materno']}}</td>
                                <td>{{$usuario['rol']}}</td>
                                <td><a href="{{route('precarga.usuario',$usuario['id_usuario'])}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="{{route('password.usuario',$usuario['id_usuario'])}}" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-unlock-keyhole"></i></a></td>
                                @if($usuario['estado'] == 0)
                                <td><span title="Deshabilitada" class="text-danger"><i class="fa-solid fa-user-large-slash mt-1"></i></span></td>
                                @else
                                <td><span title="Habilitada" class="text-success"><i class="fa-solid fa-user-check mt-1"></i></span></td>
                                @endif
                            </tr>
                        @endforeach                       
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() =>{
        $('#contenido_tabla').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
@endsection('contenido')
