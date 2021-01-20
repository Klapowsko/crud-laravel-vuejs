<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;



Route::get('/users', [UsuariosController::class, 'index']);
Route::post('/users', [UsuariosController::class, 'create']);
Route::delete('/users', [UsuariosController::class, 'destroy']);
