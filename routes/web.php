<?php

use App\Http\Controllers\DireccionController;
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
Route::get('/listado', [DireccionController::class, 'Aprobados_y_Reprobados'])->name('listado');
Route::get('/addUser', [DireccionController::class, 'agregar_usuario'])->name('agregar');
Route::get('/editarAsignacionMaterias', [DireccionController::class, 'editar_asignacion_materias'])->name('editarAsignacionMaterias');

/* acciones de sesion */
Route::post('/login',[SesionController::class, 'login'])->name('inicio.sesion');
Route::get('/logout',[SesionController::class, 'logout'])->name('cerrar.sesion');