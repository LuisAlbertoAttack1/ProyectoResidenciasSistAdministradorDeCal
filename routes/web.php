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
Route::get('/asignacionMateria', [InicioController::class, 'panel'])->name('materia');
Route::get('/listado', [InicioController::class, 'panel'])->name('listado');
Route::get('/addUser', [DireccionController::class, 'agregar_usuario'])->name('agregar');


/* acciones de sesion */
Route::post('/login',[SesionController::class, 'login'])->name('inicio.sesion');
Route::get('/logout',[SesionController::class, 'logout'])->name('cerrar.sesion');