<?php

use App\Http\Controllers\DireccionController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\SesionController;
use Illuminate\Support\Facades\Route;

/* vistas */
Route::get('/', [InicioController::class, 'index'])->name('home');
Route::get('/login', [InicioController::class, 'login'])->name('login');
Route::get('/dashboard', [InicioController::class, 'panel'])->name('panel');


/* usuario -> direccion */
Route::get('/f1', [InicioController::class, 'archivo'])->name('f1');
Route::get('/usuarios', [DireccionController::class, 'usuarios'])->name('usuarios');
Route::get('/asignacionMateria', [DireccionController::class, 'asignacion_materia'])->name('materia');
Route::get('/listado', [DireccionController::class, 'asignacion_alumnos'])->name('listado');
Route::get('/lista_materias', [DireccionController::class, 'lista_materias'])->name('listado.materia');
Route::get('/addUser', [DireccionController::class, 'agregar_usuario'])->name('agregar');
Route::get('/listado_docentes', [DireccionController::class, 'listado_docente'])->name('lista.docente');

Route::post('/crearMateria', [DireccionController::class, 'crear_materia'])->name('crear.materia');
Route::get('/addMate',[DireccionController::class, 'agregar_materia'])->name('add.materia');
Route::get('/cargarMateria{materia}',[DireccionController::class, 'precargar_materia'])->name('precarga.materia');
Route::put('/actualizar/{materia}',[DireccionController::class, 'actualizar_usuario'])->name('actualizar.materia');

Route::post('/insertUser', [DireccionController::class, 'add_usuario'])->name('agregar.usuario');
Route::get('/editar{usuario}',[DireccionController::class, 'precargar_usuario'])->name('precarga.usuario');
Route::put('/edit/{persona}',[DireccionController::class, 'editar_usuario'])->name('editar.usuario');
Route::get('/editPassword{usuario}',[DireccionController::class, 'editar_password'])->name('password.usuario');
Route::put('/editPass/{usuario}',[DireccionController::class, 'edit_password'])->name('password.edit');

Route::get('/horarios', [HorariosController::class, 'listado_horarios'])->name('horarios.lista');
Route::get('/addMateria', [HorariosController::class, 'agregar_horario'])->name('horarios.agregar');
Route::get('/delHorario/{horario}', [HorariosController::class, 'eliminar_horario'])->name('horarios.del');
Route::get('/prevHorario/{horario}', [HorariosController::class, 'precargar_horario'])->name('horarios.prev');
Route::post('/addHoario', [HorariosController::class, 'crear_horario'])->name('horario.add');

Route::delete('/deshabilitar/{usuario}',[DireccionController::class, 'deshabilitar_usuario'])->name('disabled.usuario');

Route::get('/editarAsignacionMaterias', [DireccionController::class, 'editar_asignacion_materias'])->name('editarAsignacionMaterias');

/* acciones de sesion */
Route::post('/login',[SesionController::class, 'login'])->name('inicio.sesion');
Route::get('/logout',[SesionController::class, 'logout'])->name('cerrar.sesion');
/* acciones docente */
Route::get('/listaMateriasDocente', [DocenteController::class, 'listado_horarios'])->name('docente.list');
Route::get('/alumnosMateria/{horario}', [DocenteController::class, 'cargar_horario'])->name('docente.prev');
Route::get('/miInfo', [DocenteController::class, 'direccion_docente'])->name('docente.info');
Route::post('/miDireccion', [DocenteController::class, 'agregar_direccion'])->name('docente.direct');
Route::post('/cargaDatos', [DocenteController::class, 'cargar_calificaciones'])->name('docente.carga');

/* f1 */
Route::get('/listadoF1', [DocumentosController::class, 'lista_f1'])->name('f1');
Route::get('/crearF1/{usuario}', [DocumentosController::class, 'generar_f1'])->name('generar.pdf');