@extends('plantilla')
@section('contenido')
<div class="container mt-4 mb-5">
    <div class="row justify-content-around ">
        <div class="col-12">
            <h1 class="display-6"><b><i class="fa-solid fa-users-rectangle text-verde2 me-2"></i>Listado de materias</b></h1>
        </div>
        <div class="col-md-12">
            <div class="text-end">
                <a href="{{route('panel')}}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                <a href="{{route('materia.agregar')}}" class="btn btn-outline-success mb-3"><i class="fa-solid fa-book me-2"></i>Agregar materia</a>
                <hr class="text-verde mb-4">
            </div>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="contenido_tabla">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center" scope="col">Carrera</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Hrs</th>
                            <th class="text-center" scope="col">Creditos</th>
                            <th class="text-center" scope="col">Semestre</th>
                            <th class="text-center" scope="col">Editar</th>                            
                            <th class="text-center" scope="col">Estado</th>
                        </tr>
                    <thead>   
                    <tbody> 
                        @foreach($consulta as $materia)
                            <tr>
                                <td class="text-start">{{$materia['nombre_carrera']}}</td>
                                <td class="text-start align-middle">{{$materia['nombre_materia']}}</td>
                                <td class="align-middle">{{$materia['horas']}}</td>
                                <td class="align-middle">{{$materia['creditos']}}</td>
                                <td class="align-middle">{{$materia['semestre']}}</td>
                                <td class="align-middle"><a href="{{route('precarga.materia',$materia['id_materia'])}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                @if($materia['estado'] != 0)
                                <td class="align-middle"><span class="text-success" title="Habilitada"><i class="fa-regular fa-circle-check"></i></span></td>
                                @else
                                <td class="align-middle"><span class="text-danger" title="Deshabilitada"><i class="fa-solid fa-ban"></i></span></td>
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
