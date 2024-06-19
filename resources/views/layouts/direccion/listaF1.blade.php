@extends('plantilla')
@section('contenido')
<div class="container mt-4 mb-5">
    <div class="row justify-content-around ">
        <div class="col-12">
            <h1 class="display-6"><b><i class="fa-regular fa-clock text-verde2 me-2"></i>Listado F1</b></h1>
        </div>
        <div class="col-md-12">
            <div class="text-end">
                <a href="{{route('panel')}}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                <hr class="text-verde mb-4">
            </div>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="contenido_tabla">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center" scope="col">Materia</th>
                            <th class="text-center" scope="col">Carrera</th>
                            <th class="text-center" scope="col">Docente</th>
                            <th class="text-center" scope="col">Grupo</th>
                            <th class="text-center" scope="col">Semestre</th>
                            <th class="text-center" scope="col">Descargar</th>
                        </tr>
                    <thead>   
                    <tbody> 
                        @foreach($consulta as $horario)
                            <tr>
                                <td class="text-start text-sm">{{$horario['nombre_materia']}}</td>
                                <td class="align-middle text-sm">{{$horario['nombre_carrera']}}</td>
                                <td class="align-middle text-sm">{{$horario['nombre']." ".$horario['apellido_paterno']." ".$horario['apellido_materno']}}</td>
                                <td class="align-middle text-sm">{{$horario['grupo']}}</td>
                                <td class="align-middle text-sm">{{$horario['semestre']}}</td>
                                <td class="align-middle"><a href="{{route('generar.pdf',$horario->id_horario)}}" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa-solid fa-file-pdf"></i></a></td>
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
