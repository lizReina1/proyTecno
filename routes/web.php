<?php

use App\Http\Controllers\EstiloController;
use App\Http\Controllers\Web\ClienteController;
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

Route::get('/', [ClienteController::class,'inicial'])->name('welcome');

Route::get('/configuracion',function(){
   return view('cliente.configuracion');
})->name('configuracion');

Route::get('/servicios',[ClienteController::class,'servicios'])->name('servicio');

Route::get('/cita',function(){
    return view('cliente.cita');
 })->name('cita');

 Route::get('/pago',function(){
    return view('cliente.pago');
 })->name('pago');

Route::get('/home', function () {
    return "Bienvenido a home";
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::get('register', function () {
    return view('auth.register');
})->name('register');


Route::post('cambiar-estilo', [EstiloController::class,'cambiarEstilo'])->name('cambiar.estilo');
