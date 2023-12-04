@extends('plantilla')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-around ">
        <h1 class="display-6 mb-4"><b><i class="fa-regular fa-clock text-verde2 me-2"></i>Añadir horario</b></h1>
        <hr class="text-verde">
        <form id="frm_crear_horario" method="post" action="{{route('crear.materia')}}" class="row justify-content-around">
            @csrf
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3>Datos Materia</h3>
                    </div>
                    <div class="col-md-4">
                        @error('semestre')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo">
                            <label for="grupo" class="form-label"><i class="fa-solid fa-door-open text-verde2"></i> Grupo</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @error('carrera')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <select name="carrera" id="carrera" class="form-control" value="{{old('carrera')}}">
                                <option value="">Selecionar carrera</option>
                                @foreach($carreras as $carrera)
                                <option value="{{$carrera['id_carrera']}}">{{$carrera['nombre_carrera']}}</option>                                
                                @endforeach
                            </select>
                            <label for="carrera" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip text-verde2"></i> Carrera</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @error('semestre')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <select name="semestre" id="semestre" class="form-control" value="{{old('semestre')}}">
                                <option value="">Seleccionar semestre</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <label for="semestre" class="form-label"><i class="fa-solid fa-user text-verde2"></i> Semestre</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        @error('materia')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <select name="materia" id="materia" class="form-control" value="{{old('materia')}}">
                                <option value="">Selecionar materia</option>
                                @foreach($materias as $materia)
                                <option value="{{$materia['id_materia']}}">{{$materia['nombre_materia']}}</option>                                
                                @endforeach
                            </select>
                            <label for="materia" class="form-label"><i class="fa-solid fa-scale-unbalanced-flip text-verde2"></i> Materia</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @error('docente')
                        <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i> {{$message}}</p>
                        @enderror 
                        <div class="form-floating mb-3">
                            <select name="carrera" id="docente" class="form-control" value="{{old('docente')}}">
                                <option value="">Selecionar docente</option>
                                @foreach($docentes as $docente)
                                <option value="{{$carrera['id_usuario']}}">{{$docente['apellido_paterno']." ".$docente['apellido_materno']." ".$docente['nombre']}}</option>
                                @endforeach
                            </select>
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
                    <div class="col-lg-12">
                        <div id="tabla_horas" class="table-responsive">
                            <table class="table table-sm table-responsive-lg">
                                <thead class="text-center fw-bolder">
                                    <th>Hora</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miércoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="container text-center">
                                                <div class="row my-2">
                                                    <div class="col-lg-12">
                                                        <div class="py-2 mb-1">
                                                            <span><b>Inicial:</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-lg-12">
                                                        <div class="py-2 mb-1">
                                                            <span><b>Final:</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @for ($i = 1; $i < 6; $i++)
                                            <td>
                                                <div class="container">
                                                    <div class="row my-2">
                                                        <div class="col-lg-12 text-center">
                                                            <div class="input-group mb-2">
                                                                <select class="form-select" name="hora_inicio{{$i}}" id="hora_inicio{{$i}}">
                                                                    <option value="">--:--</option>
                                                                    <option value="07:00">07:00</option>
                                                                    <option value="07:50">07:50</option>
                                                                    <option value="08:40">08:40</option>
                                                                    <option value="09:30">09:30</option>
                                                                    <option value="10:20">10:20</option>
                                                                    <option value="11:10">11:10</option>
                                                                    <option value="12:00">12:00</option>
                                                                    <option value="12:50">12:50</option>
                                                                    <option value="13:40">13:40</option>
                                                                    <option value="14:30">14:30</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-lg-12 text-center">
                                                            <div class="input-group mb-2">
                                                                <select class="form-select" name="hora_fin{{$i}}" id="hora_fin{{$i}}"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="text-end">
                <a href="{{route('horarios.lista')}}" class="btn btn-outline-danger mb-3"><i class="fa-solid fa-rotate-left me-2"></i>Regresar</a>
                <button type="submit" class="btn btn-outline-success mb-3"><i class="fa-regular fa-clock me-2"></i>Añadir horario</button>
            </div>
        </form>
    </div>
</div>
<script>
    const horarios = ["07:00","07:50","08:40","09:30","10:20","11:10","12:00","12:50","13:40","14:30"];

    const actualizar_hora_final = (inicio,fin) => {
        let opciones = '<option value="">--:--</option>';
        let validacion = false;
        for(let i = 0; i < horarios.length; i++){
            if(horarios[i] == inicio){
                validacion = true;
                continue;    
            }
            if(validacion){
                opciones += `<option value="${horarios[i]}">${horarios[i]}</option>`;
            }
        }
        $(`#hora_fin${fin}`).html(opciones);
    }

    $('#hora_inicio1').on('change',()=>{
        actualizar_hora_final($('#hora_inicio1').val(),1);
    });
    $('#hora_inicio2').on('change',()=>{
        actualizar_hora_final($('#hora_inicio2').val(),2);
    });
    $('#hora_inicio3').on('change',()=>{
        actualizar_hora_final($('#hora_inicio3').val(),3);
    });
    $('#hora_inicio4').on('change',()=>{
        actualizar_hora_final($('#hora_inicio4').val(),4);
    });
    $('#hora_inicio5').on('change',()=>{
        actualizar_hora_final($('#hora_inicio5').val(),5);
    });
    $(document).ready(() => {
        $('#frm_crear_horario').on('submit', (e) => {
            e.preventDefault();
        });
    });
</script>
@endsection('contenido')