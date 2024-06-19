<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PuestoController;
use App\Models\Puesto;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function() {
    return "Hola mundo";
});
Route::get('presentacion',[PresentacionController::class,'index']);
//Route::get('login', [FormController::class,'index']);
Route::post('validate', [FormController::class,'login'])->name('login.validate');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/division/nueva', [DivisionController::class, 'view'])->name('division.nueva')->middleware('auth');
Route::post('/division/guardar', [DivisionController::class, 'store'])->name('division.guardar')->middleware('auth');


Route::get('/divisiones', [DivisionController::class, 'index'])->name('divisiones')->middleware('auth','role');

Route::delete('/division/eliminar/{id}', [DivisionController::class, 'delete'])->name('division.eliminar')->middleware('auth');

/*PUESTO*/

Route::get('/puesto/nueva', [PuestoController::class, 'view'])->name('puesto.nueva')->middleware('auth');
Route::post('/puesto/guardar', [PuestoController::class, 'store'])->name('puesto.guardar')->middleware('auth');


Route::get('/puestos', [PuestoController::class, 'index'])->name('puestos')->middleware('auth','role');

Route::delete('/puesto/eliminar/{id}', [PuestoController::class, 'delete'])->name('puesto.eliminar')->middleware('auth');

/*profesores*/

Route::get('/profesor/nueva', [ProfesorController::class, 'view'])->name('profesor.nueva')->middleware('auth');
Route::post('/profesor/guardar', [ProfesorController::class, 'store'])->name('profesor.guardar')->middleware('auth');


Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores')->middleware('auth','role');

Route::delete('/profesor/eliminar/{id}', [ProfesorController::class, 'delete'])->name('profesor.eliminar')->middleware('auth');

/*Permisos*/
Route::get('/permisos/pendientes', [PermisoController::class, 'PermisosPendientes'])->name('pendientes')->middleware('auth', 'role');   
Route::get('/permisos/autorizados', [PermisoController::class, 'PermisosAutorizados'])->name('permisos.autorizados')->middleware('auth', 'role');
Route::get('/permisos/rechazados', [PermisoController::class, 'PermisosRechazados'])->name('permisos.rechazados')->middleware('auth', 'role');

Route::post('/permisos/aprobar/{id}', [PermisoController::class, 'autorizar'])->name('aprobar_permiso');
Route::post('/permisos/denegar/{id}', [PermisoController::class, 'rechazar'])->name('denegar_permiso');


