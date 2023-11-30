@extends('plantilla')
@section('contenido')
<div class="container mt-4 mb-5">
    <div class="row justify-content-around ">
        <div class="col-12">
            <h1 class="display-6"><b><i class="fa-solid fa-users-rectangle text-verde2 me-2"></i>Listado de horarios</b></h1>
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
                            <th class="text-center" scope="col">Semestre</th>                       
                            <th class="text-center" scope="col">Grupo</th>
                            <th class="text-center" scope="col">Lunes</th>
                            <th class="text-center" scope="col">Martes</th>
                            <th class="text-center" scope="col">Miercoles</th>
                            <th class="text-center" scope="col">Jueves</th>
                            <th class="text-center" scope="col">Viernes</th>
                        </tr>
                    <thead>   
                    <tbody> 
                        @foreach($consulta as $horario)
                            <tr>
                                <td class="">{{$horario['nombre_materia']}}</td>
                                <td class=" align-middle">{{$horario['nombre_carrera']}}</td>
                                <td class="align-middle">{{$horario['semestre']}}</td>
                                <td class="align-middle">{{$horario['grupo']}}</td>
                                <td class="align-middle">{{$horario['lunes']}}</td>
                                <td class="align-middle">{{$horario['martes']}}</td>
                                <td class="align-middle">{{$horario['miercoles']}}</td>
                                <td class="align-middle">{{$horario['jueves']}}</td>
                                <td class="align-middle">{{$horario['viernes']}}</td>
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
