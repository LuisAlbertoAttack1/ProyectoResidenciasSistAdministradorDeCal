<?php
    require_once './FPDF/force_justify.php';
    use App\Models\CicloEscolar;
    
    $mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
    date_default_timezone_set('America/Mexico_City');
    /* $dia = date("d");
    $me = date("m");*/
    $year = date("Y"); 

	class PDF extends JPDF{
		function periodo(){
			$consulta = CicloEscolar::select('id_ciclo_escolar')->orderBy('id_ciclo_escolar','desc')->first();
			return $consulta->inicio.'-'.$consulta->fin;
		}
		function Header(){ 
			$this->Image('../img/logo_edomex.png',13,13,27,10,'png');
            $this->Image('../img/Logo_EDOMEX2.png',111,15,33,10,'png');
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
            $this->Cell(15,3,utf8_decode('AGOSTO'),1,0,'L');
            $this->Cell(33,3,utf8_decode('5'),1,1,'C');
            $this->SetX(155);
            $this->Cell(15,3,utf8_decode('AGOSTO'),1,0,'L');
            $this->Cell(33,3,utf8_decode('5'),1,1,'C');
            $this->SetX(155);
            $this->Cell(15,3,utf8_decode('AGOSTO'),1,0,'L');
            $this->Cell(33,3,utf8_decode('5'),1,1,'C');
            $this->SetX(155);
            $this->Cell(15,3,utf8_decode('AGOSTO'),1,0,'L');
            $this->Cell(33,3,utf8_decode('5'),1,1,'C');
            $this->SetX(155);
            $this->Cell(15,3,utf8_decode('AGOSTO'),1,0,'L');
            $this->Cell(33,3,utf8_decode('5'),1,1,'C');
            $this->SetX(155);
            $this->Cell(15,3,utf8_decode('AGOSTO'),1,0,'L');
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
    $pdf->Cell(10,5,utf8_decode('3'),0,0,'L');
    $pdf->Cell(15,5,utf8_decode('Grupo:'),0,0,'L');
    $pdf->Cell(10,5,utf8_decode('1'),0,0,'L');
    $pdf->Cell(13,5,utf8_decode('Turno:'),0,0,'L');
    $pdf->Cell(19,5,utf8_decode('MATUTINO'),0,0,'L');
    $pdf->Cell(24,5,utf8_decode('Ciclo Escolar:'),0,0,'L');
    $pdf->Cell(24,5,utf8_decode('2023-2024'),0,1,'L');

    $pdf->Ln(2);
    $pdf->SetX(13);
    $pdf->Cell(17,5,utf8_decode('Profesor(a): '),0,0,'L');
    $pdf->Cell(40,5,utf8_decode('GONZALO ARELLANO'),0,1,'L');
    $pdf->SetX(13);
    $pdf->Cell(17,5,utf8_decode('Domicilio: '),0,0,'L');
    $pdf->Cell(40,5,utf8_decode('SUR 18"A" No 65'),0,1,'L');
    $pdf->SetX(13);
    $pdf->Cell(17,5,utf8_decode('Poblado: '),0,0,'L');
    $pdf->Cell(20,5,utf8_decode('AGRICOLA'),0,0,'L');
    $pdf->Cell(20,5,utf8_decode('Municipio: '),0,0,'L');
    $pdf->Cell(40,5,utf8_decode('IZTACALCO'),0,0,'L');

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
    $pdf->Cell(19,5,utf8_decode('07:50-08:40'),0,0,'C');
    $pdf->Cell(19,5,utf8_decode(''),0,0,'C');
    $pdf->Cell(19,5,utf8_decode(''),0,0,'C');
    $pdf->Cell(19,5,utf8_decode('10:50-11:40'),0,0,'C');
    $pdf->Cell(19,5,utf8_decode(''),0,1,'C');

    $pdf->SetFont('Arial','B',7);
    $pdf->SetX(18);
    $pdf->Cell(60,5,utf8_decode('Bachillerato Tecnológico con la Carrera en: '),0,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(50,5,utf8_decode('TÉCNICO EN CONTABILIDAD'),0,1,'C');
    
    $pdf->SetFont('Arial','B',7);
    $pdf->SetX(23);
    $pdf->Cell(20,5,utf8_decode('Materia: '),0,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(50,5,utf8_decode('CIENCIA, TECNOLOGIA, SOCIEDAD Y VALORES'),0,1,'C');
    
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
    
    $pdf->SetFont('Arial','',6);
    for($i =1; $i <= 50; $i++){
        $pdf->SetX(10);
        $pdf->Cell(5,4,utf8_decode(''.$i),1,0,'C');
        $pdf->Cell(7,4,utf8_decode('H'),1,0,'C');
        $pdf->Cell(63,4,utf8_decode('NOMBRE COMPLETO DEL ALUMNO'),1,0,'L');
        $pdf->Cell(8,4,utf8_decode('1a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('2a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('3a.'),1,0,'C');
        $pdf->Cell(13,4,utf8_decode('TOTAL'),1,0,'C');
        $pdf->Cell(13,4,utf8_decode('%'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('1a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('2a.'),1,0,'C');
        $pdf->Cell(8,4,utf8_decode('3a.'),1,0,'C');
        $pdf->Cell(9,4,utf8_decode('SUM.'),1,0,'C');
        $pdf->Cell(9,4,utf8_decode('CALIF.'),1,0,'C');
        $pdf->Cell(27,4,utf8_decode('CALIF.'),1,1,'C');
    }

    $pdf->SetX(10);
    $pdf->Cell(5,4,utf8_decode('H'),1,0,'C');
    $pdf->Cell(7,4,utf8_decode('4'),1,1,'C');
    $pdf->SetX(10);
    $pdf->Cell(5,4,utf8_decode('M'),1,0,'C');
    $pdf->Cell(7,4,utf8_decode('4'),1,1,'C');
    $pdf->SetX(10);
    $pdf->Cell(5,4,utf8_decode('T'),1,0,'C');
    $pdf->Cell(7,4,utf8_decode('4'),1,1,'C');

    $pdf->Output('I', 'F1.pdf');
?>