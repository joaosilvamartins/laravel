<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

Route::get('/registro', [UsuarioController::class, 'registro']);
Route::post('/registro', [UsuarioController::class, 'campoDeBusca']);

Route::get('/formulario', [UsuarioController::class, 'form']);
Route::post('/formulario', [UsuarioController::class, 'store']);

Route::get('/', [LoginController::class, 'welcome']);
Route::post('/', [LoginController::class, 'cadastro']);

Route::get('/esqueceuASenha', [LoginController::class, 'esqueceuSenha']);
Route::post('/esqueceuASenha', [LoginController::class, 'voltarParaLogin']);

Route::get('/', [LoginController::class, 'voltar']);