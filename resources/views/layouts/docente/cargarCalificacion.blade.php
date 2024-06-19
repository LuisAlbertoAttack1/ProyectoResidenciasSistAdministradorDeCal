@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-around ">
        <h1 class="display-6 mb-4"><b><i class="fa-solid fa-check text-verde2 me-2"></i>Asiganacion de calificaciones</b></h1>
        <hr class="text-verde">
        <form id="frm_asignar_calificaciones" method="post" action="{{route('docente.carga')}}" class="row justify-content-around">
            @csrf
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3>Datos Materia</h3>
                    </div>
                    <div class="col-md-4">
                        <input name="id_horario" type="text" value="{{$consulta->id_horario}}" hidden>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo" value="{{$consulta->grupo}}" readonly>
                            <label for="grupo" class="form-label"><i class="fa-solid fa-door-open text-verde2"></i> Grupo</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="carrera" id="carrera" class="form-control" value="{{$consulta->nombre_carrera}}" readonly>
                            <label for="carrera" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip text-verde2"></i> Carrera</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="semestre" id="semestre" class="form-control" value="{{$consulta->semestre}}" readonly>
                            <label for="semestre" class="form-label"><i class="fa-solid fa-user text-verde2"></i> Semestre</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating mb-3">
                            <input name="materia" id="materia" class="form-control" value="{{$consulta->nombre_materia}}" readonly>
                            <label for="materia" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip text-verde2"></i> Materia</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="docente" id="docente" class="form-control" value="{{$consulta->apellido_paterno}} {{$consulta->apellido_materno}} {{$consulta->nombre}}" readonly>
                            <label for="docente" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip text-verde2"></i> Docente</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-12">
                        <hr class="text-verde">
                        <h3>Horarios clase</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-md table-striped table-responsive-lg mt-3 text-center" id="contenido_tabla">
                                <thead>
                                    <tr class="text-center">              
                                        <th class="text-center" scope="col">Lunes</th>
                                        <th class="text-center" scope="col">Martes</th>
                                        <th class="text-center" scope="col">Miercoles</th>
                                        <th class="text-center" scope="col">Jueves</th>
                                        <th class="text-center" scope="col">Viernes</th>
                                    </tr>
                                <thead>   
                                <tbody> 
                                    <tr>
                                        <td class="align-middle">{{$consulta['lunes']}}</td>
                                        <td class="align-middle">{{$consulta['martes']}}</td>
                                        <td class="align-middle">{{$consulta['miercoles']}}</td>
                                        <td class="align-middle">{{$consulta['jueves']}}</td>
                                        <td class="align-middle">{{$consulta['viernes']}}</td>
                                    </tr>                     
                                </tbody>              
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <hr class="text-verde">
                        <h3>Asigancion de calificación</h3>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-control" name="cantidad_alumnos" id="cantidad_alumnos">
                                @for($i = 1; $i < 61; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <label for="cantidad_alumnos" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip text-verde2"></i> Cantidad de alumnos en grupo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row text-center">
                    <div class="col-1">
                        <p>No.</p>
                    </div>
                    <div class="col-1">
                        <p>Sexo</p>
                    </div>
                    <div class="col-4">
                    <p>Nombre completo del alumno</p>
                    </div>
                    <div class="col-3">
                        <p>Faltas de asistencia</p>
                    </div>
                    <div class="col-3">
                        <p>Evaluaciones</p>
                    </div>
                </div>
            </div>
            <div class="col-12" id="alumnos"></div>
            <div class="text-end">
                <a href="{{route('horarios.lista')}}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                <button type="submit" class="btn btn-outline-success mb-3"><i class="fa-solid fa-check me-2"></i>Asignar calificaciones</button>
            </div>
        </form>
    </div>
</div>
<script>
    let total = 0;
    const cantidad_alumnos = (fin) => {
        let input = '';
        for(let i = 1; i <= fin; i++){
            input += `
                <div class="row">
                        <div class="col-1">
                            <div class="form-floating mb-3">
                                <input class="form-control" value="${i}" type="text" readonly>
                                <label for="" class="form-label">No.</label>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-floating mb-3">
                                <select name="sexo_alumno${i}" id="sexo_alumno${i}" class="form-control">
                                    <option value="H">Hombre</option>
                                    <option value="M">Mujer</option>
                                </select>
                                <label for="sexo_alumno${i}" class="form-label"><i class="fa-solid fa-venus-mars me-2 text-verde2"></i>Sexo</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input name="nombre_alumno${i}" id="nombre_alumno${i}" class="form-control" value="">
                                <label for="nombre_alumno${i}" class="form-label"><i class="fa-solid fa-file-signature me-2 text-verde2"></i> Nombre completo alumno</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="falta1_${i}" id="falta1_${i}" type="text">
                                        <label for="falta1_${i}" class="form-label">1a.</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="falta2_${i}" id="falta2_${i}" type="text">
                                        <label for="falta2_${i}" class="form-label">2a.</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="falta3_${i}" id="falta3_${i}" type="text">
                                        <label for="falta3_${i}" class="form-label">3a.</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="faltaTotal_${i}" id="faltaTotal_${i}" type="text">
                                        <label for="faltaTotal_${i}" class="form-label">Total</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="evaluacion1_${i}" id="evaluacion1_${i}" type="text">
                                        <label for="evaluacion1_${i}" class="form-label">1a.</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="evaluacion2_${i}" id="evaluacion2_${i}" type="text">
                                        <label for="evaluacion2_${i}" class="form-label">2a.</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="evaluacion3_${i}" id="evaluacion3_${i}" type="text">
                                        <label for="evaluacion3_${i}" class="form-label">3a.</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="evaluacionTotal_${i}" id="evaluacionTotal_${i}" type="text">
                                        <label for="evaluacionTotal_${i}" class="form-label">Total</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            `;
        }
        $(`#alumnos`).html(input);
    }
    
    const validar_vacios = () =>{
        for(let i = 1; i <= total; i++){
            if($(`#nombre_alumno${i}`).val() == "" ||
                $(`#falta1_${i}`).val() == "" ||
                $(`#falta2_${i}`).val() == "" ||
                $(`#falta3_${i}`).val() == "" ||
                $(`#faltaTotal_${i}`).val() == "" ||
                $(`#evaluacion1_${i}`).val() == "" ||
                $(`#evaluacion2_${i}`).val() == "" ||
                $(`#evaluacion3_${i}`).val() == "" ||
                $(`#evaluacionTotal_${i}`).val() == ""){
                alert(`Datos de alumno No.${i} incompletos!!!`);
                return false;
            }
        }
        return true;
    }

    $('#cantidad_alumnos').on('change',() =>{
        cantidad_alumnos($(`#cantidad_alumnos`).val());
        total = $(`#cantidad_alumnos`).val();
    });
    $(document).ready(() => {
        $('#frm_asignar_calificaciones').on('submit', (e) => {
            if(!validar_vacios()){
                e.preventDefault();
            }
        });
    });
</script>
@endsection('contenido')
