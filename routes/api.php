<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;



Route::get('/users', [UsuariosController::class, 'index']);
Route::post('/users/add', [UsuariosController::class, 'create']);
Route::delete('/users/delete', [UsuariosController::class, 'destroy']);
Route::post('/users/edit', [UsuariosController::class, 'edit']);
