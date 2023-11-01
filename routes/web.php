<?php

use App\Http\Controllers\Inicio;
use Illuminate\Support\Facades\Route;

Route::get('/',[Inicio::class, 'index']);
Route::get('/login',[Inicio::class, 'login']);

//RUTAS DE LOGIN
// Route::get('/',[AuthController::class, 'login'])->name('auth-login');
// Route::post('/logear',[AuthController::class, 'logear'])->name('logear');