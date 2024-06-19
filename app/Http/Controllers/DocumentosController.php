<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\CicloEscolar;
use App\Models\Domicilio;
use App\Models\Horarios;
use App\Models\Materias;
use App\Models\Persona;
use App\Models\Rol;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Usuario;
use App\Models\FormatoUno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PDF extends Fpdf{
    function periodo(){
        $consulta = CicloEscolar::select('id_ciclo_escolar')->orderBy('id_ciclo_escolar','desc')->first();
        return $consulta->inicio.'-'.$consulta->fin;
    }
    function Header(){ 
        $this->Image('./img/logo_edomex.png',13,13,27,10,'png');
        $this->Image('./img/Logo_EDOMEX2.png',111,15,33,10,'png');
        $this->SetFont('Arial','B',9);
        //$this->SetTextColor(0,0,0);
        $this->SetY(27);
        $this->SetX(25);
        $this->Cell(0,5,utf8_decode('REGISTRO DE FALTAS DE ASISTENCIAS, CALIFICACIONES Y PROMEDIOS'),0,1,'L');

        $this->SetY(17);
        $this->SetX(155);
        $this->SetFont('Arial','B',6);
        $this->Cell(15,4,utf8_decode('MESES'),1,0,'L');;
        $this->Cell(33,4,utf8_decode('No. DE HORAS IMPARTIDAS'),1,1,'L');
        $this->SetX(155);
        $this->Cell(15,3,utf8_decode('ENERO'),1,0,'L');
        $this->Cell(33,3,utf8_decode('5'),1,1,'C');
        $this->SetX(155);
        $this->Cell(15,3,utf8_decode('FEBRERO'),1,0,'L');
        $this->Cell(33,3,utf8_decode('5'),1,1,'C');
        $this->SetX(155);
        $this->Cell(15,3,utf8_decode('MARZO'),1,0,'L');
        $this->Cell(33,3,utf8_decode('5'),1,1,'C');
        $this->SetX(155);
        $this->Cell(15,3,utf8_decode('ABRIL'),1,0,'L');
        $this->Cell(33,3,utf8_decode('5'),1,1,'C');
        $this->SetX(155);
        $this->Cell(15,3,utf8_decode('MAYO'),1,0,'L');
        $this->Cell(33,3,utf8_decode('5'),1,1,'C');
        $this->SetX(155);
        $this->Cell(15,3,utf8_decode('JUNIO'),1,0,'L');
        $this->Cell(33,3,utf8_decode('5'),1,1,'C');
        $this->SetX(155);
        $this->Cell(15,4,utf8_decode('TOTAL'),1,0,'C');
        $this->Cell(33,4,utf8_decode(''),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,5,utf8_decode('DATOS ESTADISTICOS'),1,0,'C');
        $this->Cell(15,5,utf8_decode('TOTAL'),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,3,utf8_decode('No. de alumnos inscritos'),1,0,'L');
        $this->Cell(15,3,utf8_decode('40'),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,3,utf8_decode('Bajas durante el semestre'),1,0,'L');
        $this->Cell(15,3,utf8_decode('0'),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,3,utf8_decode('Existencia a final de semestre'),1,0,'L');
        $this->Cell(15,3,utf8_decode('40'),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,3,utf8_decode('No. de alumnos aprobados'),1,0,'L');
        $this->Cell(15,3,utf8_decode('0'),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,3,utf8_decode('No. de alumnos reprobados'),1,0,'L');
        $this->Cell(15,3,utf8_decode('40'),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,3,utf8_decode('% de alumnos aprobados'),1,0,'L');
        $this->Cell(15,3,utf8_decode('0%'),1,1,'C');
        $this->SetX(155);
        $this->Cell(33,3,utf8_decode('Promedio de calificaciones'),1,0,'L');
        $this->Cell(15,3,utf8_decode('5.00'),1,1,'C');
        $this->SetX(155);
    }
    function Footer(){
        $this->SetY(-35);
        $this->SetFont('Arial','',7);
        $this->SetX(10);
        $this->Cell(200,7,utf8_decode('SANTA CATARINA AYOTZINGO, CHALCO MÉX;'),0,1,'C');
        $this->SetFont('Arial','B',7);
        $this->Cell(67,3,utf8_decode(''),0,0,'C');
        $this->Cell(67,3,utf8_decode('Vo. Bo.'),0,0,'C');
        $this->Cell(67,3,utf8_decode('Vo. Bo.'),0,1,'C');
        $this->SetFont('Arial','B',7);
        $this->SetX(10);
        $this->Cell(67,5,utf8_decode('PROFESOR(A) DE LA ASIGNATURA'),0,0,'C');
        $this->Cell(67,5,utf8_decode('EL SECRETARIO ESCOLAR'),0,0,'C');
        $this->Cell(67,5,utf8_decode('EL SUBDIRECTOR DE LA ESCUELA'),0,1,'C');
        $this->SetX(10);
        $this->Cell(67,7,utf8_decode('PROF(A)'),0,0,'L');
        $this->Cell(67,7,utf8_decode('PROFA. LIZETH LABARRIOS MEDINA'),0,0,'C');
        $this->Cell(67,7,utf8_decode('PROFA. MARIA DE LOURDES MARTINEZ ANZURES'),0,1,'C');
        $this->SetFont('Arial','B',5);
        $this->Cell(200,3,utf8_decode('SECRETARÍA DE EDUCACIÓN'),0,1,'R');
        $this->SetFont('Arial','',5);
        $this->Cell(200,2,utf8_decode('SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR Y SUPERIOR'),0,1,'R');
        $this->Cell(200,2,utf8_decode('DIRECCION GENERAL DE EDUCACION MEDIO SUPERIOR'),0,1,'R');
        $this->Cell(200,2,utf8_decode('SUBDIRECCION DE BACHILLERATO TECNOLOGICO'),0,1,'R');
        $this->Cell(200,2,utf8_decode('SUPERVISION ESCOLAR ZONA BT 024'),0,1,'R');
    }
}

class DocumentosController extends Controller
{   
    //funcion para validar si existe una sesion y si existe corresponda al rol adecuado
     private function validar_sesion(){
        return !Auth::user() || Auth::user()->fk_cat_rol == 3;
    }
    //funcion para obtener los datos del usuario con sesion activa 
    private function datos_sesion(){
        $infoUsuario = Persona::where('id_persona',Auth::user()->fk_persona)->first();
        $rol = Rol::where('id_cat_rol',Auth::user()->fk_cat_rol)->first();
        $infoUsuario['puesto'] = $rol->rol;
        return $infoUsuario;        
    }
    public function lista_f1(){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $titulo = 'Listado de F1';
        $infoUsuario = $this->datos_sesion();
        $ciclo = CicloEscolar::select('id_ciclo_escolar')->orderBy('id_ciclo_escolar','desc')->first();
        $consulta = Horarios::select('id_horario','t_horario.fk_usuario','nombre_materia','nombre_carrera','grupo','t_horario.semestre','t_persona.nombre','t_persona.apellido_paterno','t_persona.apellido_materno')->join('t_materia','t_horario.fk_materia','t_materia.id_materia')->join('t_carrera','t_horario.fk_carrera','t_carrera.id_carrera')->join('t_usuario','t_horario.fk_usuario','t_usuario.id_usuario')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('fk_ciclo_escolar',$ciclo->id_ciclo_escolar)->get();
        return view('layouts/direccion/listaF1', compact('titulo','infoUsuario','consulta'));        
    }

    public function horario($horario){
        return Horarios::select('t_horario.fk_usuario','nombre_materia','nombre_carrera','lunes','martes','miercoles','jueves','viernes','grupo','t_horario.semestre','t_persona.nombre','t_persona.apellido_paterno','t_persona.apellido_materno','t_ciclo_escolar.inicio','t_ciclo_escolar.fin')->join('t_materia','t_horario.fk_materia','t_materia.id_materia')->join('t_carrera','t_horario.fk_carrera','t_carrera.id_carrera')->join('t_usuario','t_horario.fk_usuario','t_usuario.id_usuario')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_ciclo_escolar','t_horario.fk_ciclo_escolar','t_ciclo_escolar.id_ciclo_escolar')->where('t_horario.id_horario',$horario)->first();
    }

    public function direccion_docente($id){
        return Domicilio::select('domicilio','municipio','poblado')->where('fk_usuario',$id)->first();
    }

    public function cal_alumnos($id){
        return FormatoUno::where('fk_horario',$id)->orderBy('id_formato_uno','asc')->get();
    }

    public function generar_f1($usuario){
        if($this->validar_sesion()){
            return redirect('/');
        }
        $horario_inf = $this->horario($usuario);
        $pdf = new PDF('P','mm',array(216, 356));
        $pdf->AliasNbPages();
        $pdf->AddPage();
        

        $pdf->SetFont('Arial','B',7);
        $pdf->SetY(34);
        $pdf->SetX(13);
        $pdf->Cell(17,5,utf8_decode('Escuela:'),0,0,'L');
        $pdf->Cell(40,5,utf8_decode('CBT No. 3 SR. MAX SHEIN HEISLER'),0,1,'L');
        $pdf->SetX(13);
        $pdf->Cell(17,5,utf8_decode('Domicilio:'),0,0,'L');
        $pdf->Cell(40,5,utf8_decode('CARRETERA CHALCO MASECA S/N'),0,1,'L');
        $pdf->SetX(13);
        $pdf->Cell(17,5,utf8_decode('Poblado:'),0,0,'L');
        $pdf->Cell(46,5,utf8_decode('SANTA CATARINA AYOTZINGO'),0,0,'L');
        $pdf->Cell(17,5,utf8_decode('Municipio:'),0,0,'L');
        $pdf->Cell(20,5,utf8_decode('CHALCO'),0,0,'L');
        $pdf->Cell(17,5,utf8_decode('Semestre:'),0,0,'L');
        $pdf->Cell(20,5,utf8_decode('QUINTO'),0,1,'L');
        $pdf->SetX(13);
        $pdf->Cell(15,5,utf8_decode('Grado:'),0,0,'L');
        $pdf->Cell(10,5,utf8_decode(''.$horario_inf->semestre),0,0,'L');
        $pdf->Cell(15,5,utf8_decode('Grupo:'),0,0,'L');
        $pdf->Cell(10,5,utf8_decode(''.$horario_inf->grupo),0,0,'L');
        $pdf->Cell(13,5,utf8_decode('Turno:'),0,0,'L');
        $pdf->Cell(19,5,utf8_decode('MATUTINO'),0,0,'L');
        $pdf->Cell(24,5,utf8_decode('Ciclo Escolar:'),0,0,'L');
        $pdf->Cell(24,5,utf8_decode(''.$horario_inf->inicio.'-'.$horario_inf->fin),0,1,'L');

        $direccion = $this->direccion_docente($horario_inf->fk_usuario);
        $pdf->Ln(2);
        $pdf->SetX(13);
        $pdf->Cell(17,5,utf8_decode('Profesor(a): '),0,0,'L');
        $pdf->Cell(40,5,utf8_decode(''.$horario_inf->nombre.' '.$horario_inf->apellido_paterno.' '.$horario_inf->apellido_materno),0,1,'L');
        $pdf->SetX(13);
        $pdf->Cell(17,5,utf8_decode('Domicilio: '),0,0,'L');
        $pdf->Cell(40,5,utf8_decode(''.$direccion->domicilio),0,1,'L');
        $pdf->SetX(13);
        $pdf->Cell(17,5,utf8_decode('Poblado: '),0,0,'L');
        $pdf->Cell(20,5,utf8_decode(''.$direccion->poblado),0,0,'L');
        $pdf->Cell(20,5,utf8_decode('Municipio: '),0,0,'L');
        $pdf->Cell(40,5,utf8_decode(''.$direccion->municipio),0,0,'L');

        $pdf->Ln(7);
        $pdf->SetX(13);
        $pdf->Cell(14,5,utf8_decode('Horario: '),0,0,'L');
        $pdf->Cell(19,5,utf8_decode('Lunes'),0,0,'C');
        $pdf->Cell(19,5,utf8_decode('Martes'),0,0,'C');
        $pdf->Cell(19,5,utf8_decode('Miercoles'),0,0,'C');
        $pdf->Cell(19,5,utf8_decode('Jueves'),0,0,'C');
        $pdf->Cell(19,5,utf8_decode('Viernes'),0,1,'C');
        $pdf->SetFont('Arial','',6);
        $pdf->SetX(13);
        $pdf->Cell(14,5,utf8_decode(''),0,0,'L');
        $pdf->Cell(19,5,utf8_decode(''.$horario_inf->lunes),0,0,'C');
        $pdf->Cell(19,5,utf8_decode(''.$horario_inf->martes),0,0,'C');
        $pdf->Cell(19,5,utf8_decode(''.$horario_inf->miercoles),0,0,'C');
        $pdf->Cell(19,5,utf8_decode(''.$horario_inf->jueves),0,0,'C');
        $pdf->Cell(19,5,utf8_decode(''.$horario_inf->viernes),0,1,'C');

        $pdf->SetFont('Arial','B',7);
        $pdf->SetX(18);
        $pdf->Cell(60,5,utf8_decode('Bachillerato Tecnológico con la Carrera en: '),0,0,'L');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(50,5,utf8_decode(''.$horario_inf->nombre_carrera),0,1,'C');
        
        $pdf->SetFont('Arial','B',7);
        $pdf->SetX(23);
        $pdf->Cell(20,5,utf8_decode('Materia: '),0,0,'L');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(50,5,utf8_decode(''.$horario_inf->nombre_materia),0,1,'C');
        
        $pdf->SetFont('Arial','B',7);
        $pdf->Ln(5);
        $pdf->SetX(10);
        $pdf->Cell(5,7,utf8_decode('NP'),1,0,'C');
        $pdf->Cell(7,7,utf8_decode('SEXO'),1,0,'C');
        $pdf->Cell(63,7,utf8_decode('NOMBRE COMPLETO DEL ALUMNO'),1,0,'C');
        $pdf->Cell(50,3,utf8_decode('FALTAS DE ASISTENCIA'),1,0,'C');
        $pdf->Cell(24,3,utf8_decode('EVALUACIONES'),1,0,'C');
        $pdf->Cell(9,7,utf8_decode('SUM.'),1,0,'C');
        $pdf->Cell(9,7,utf8_decode('CALIF.'),1,0,'C');
        $pdf->MultiCell(27,3.5,utf8_decode('OBSERVACIONES FECHA'),1,'C');
        $pdf->SetY(101);
        $pdf->SetX(85);
        $pdf->Cell(8,4,utf8_decode('1a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('2a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('3a.'),1,0,'C');
        $pdf->Cell(13,4,utf8_decode('TOTAL'),1,0,'C');
        $pdf->Cell(13,4,utf8_decode('%'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('1a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('2a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('3a.'),1,1,'C');
        
        $alumnos = $this->cal_alumnos($usuario);

        $pdf->SetFont('Arial','',6);
        $i = 1;
        $h = 0;
        $m = 0;
        foreach($alumnos as $alumno){
            if($alumno->sexo =="H"){
                $h++;
            }else{
                $m++;
            }
            $pdf->SetX(10);
            $pdf->Cell(5,4,utf8_decode(''.$i),1,0,'C');
            $pdf->Cell(7,4,utf8_decode(''.$alumno->sexo),1,0,'C');
            $pdf->Cell(63,4,utf8_decode(''.$alumno->nom_alumno),1,0,'L');
            $pdf->Cell(8,4,utf8_decode(''.$alumno->falta1),1,0,'C');
            $pdf->Cell(8,4,utf8_decode(''.$alumno->falta2),1,0,'C');
            $pdf->Cell(8,4,utf8_decode(''.$alumno->falta3),1,0,'C');
            $pdf->Cell(13,4,utf8_decode(''.$alumno->falta_total),1,0,'C');
            $pdf->Cell(13,4,utf8_decode(''),1,0,'C');
            $pdf->Cell(8,4,utf8_decode(''.$alumno->cal1),1,0,'C');
            $pdf->Cell(8,4,utf8_decode(''.$alumno->cal2),1,0,'C');
            $pdf->Cell(8,4,utf8_decode(''.$alumno->cal3),1,0,'C');
            $pdf->Cell(9,4,utf8_decode(''.$alumno->cal_sum),1,0,'C');
            $pdf->Cell(9,4,utf8_decode(''.$alumno->cal_final),1,0,'C');
            $pdf->Cell(27,4,utf8_decode('E/E'),1,1,'C');
        }

        $pdf->SetX(10);
        $pdf->Cell(5,4,utf8_decode('H'),1,0,'C');
        $pdf->Cell(7,4,utf8_decode(''.$h),1,1,'C');
        $pdf->SetX(10);
        $pdf->Cell(5,4,utf8_decode('M'),1,0,'C');
        $pdf->Cell(7,4,utf8_decode(''.$m),1,1,'C');
        $pdf->SetX(10);
        $pdf->Cell(5,4,utf8_decode('T'),1,0,'C');
        $pdf->Cell(7,4,utf8_decode(''.($h+$m)),1,1,'C');

        $pdf->Output('D', 'F1_'.utf8_decode($horario_inf->nombre_materia.'_'.$horario_inf->nombre_carrera).'.pdf');
    }

}
