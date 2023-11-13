<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\SesionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index'])->name('home');
Route::get('/login', [InicioController::class, 'login'])->name('login');

Route::post('/login',[SesionController::class, 'login'])->name('inicioSesion.login');

