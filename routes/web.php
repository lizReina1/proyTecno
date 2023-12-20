<?php

use App\Http\Controllers\AtencionController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Web\TurnoController;
use App\Models\Atencion;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\EstiloController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\PersonalController;
use App\Http\Controllers\Web\ServicioController;
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

Route::get('/', [ClienteController::class, 'inicial'])->name('welcome');

Route::get('/configuracion', function () {
    return view('cliente.configuracion');
})->name('configuracion');

Route::get('/servicios', [ClienteController::class, 'servicios'])->name('servicio');

Route::get('/cita', function () {
    return view('cliente.cita');
})->name('cita');

Route::get('/pago', function () {
    return view('cliente.pago');
})->name('pago');

Route::get('/home', function () {
    return "Bienvenido a home";
})->name('home');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::get('login', function () {
//     return "ir a login";
// })->name('login');
// Route::get('register', function () {
//     return "ir a register";
// })->name('register');


Route::post('cambiar-estilo', [EstiloController::class, 'cambiarEstilo'])->name('cambiar.estilo');

//Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function () {
        return view('pages/utility/404');
    });

    // Gestionar Personal
    Route::resource('/personal', PersonalController::class)->names('personal');
    // Gestionar Servicio
    Route::resource('/servicio', ServicioController::class)->names('servicio');
    //Gestionar Turno
    Route::resource('/turno', TurnoController::class)->names('turno');
});

// Route::get('login', function () {
//     return "ir a login";
// })->name('login');
// Route::get('register', function () {
//     return "ir a register";
// })->name('register');


Route::post('cambiar-estilo', [EstiloController::class, 'cambiarEstilo'])->name('cambiar.estilo');
// ************** payment *********************
Route::get('/payments', [PaymentController::class, 'index'])->name('payment_index');
Route::get('/payments/generate_payment', [PaymentController::class, 'generatePayment']);

//************************* atenciones ****************************/
Route::post('/attentions/get_attentions_turn', [AtencionController::class, 'getAttentionsDoctor']);

//*********** orden *******************************/
Route::get('/orden', [OrdenController::class, 'index'])->name('orden_index');

//********************** reporte *********************************/
Route::get('/report/order/pdf', [OrdenController::class, 'generatePdfOrder']);

//************************* cita  *********************/
Route::get('/cita', [CitaController::class, 'medico_cita_index'])->name('medico_cita_index');
Route::get('/cita/create', [CitaController::class, 'medico_cita_create'])->name('medico_cita_create');
Route::post('/cita/store', [CitaController::class, 'medico_cita_store'])->name('medico_cita_store');
Route::get('/cita/medico/edit/store', [CitaController::class, 'medico_cita_edit_store'])->name('medico_cita_edit_store');
Route::post('/cita/medico/edit', [CitaController::class, 'medico_cita_edit'])->name('medico_cita_edit');
Route::post('/cita/medico/delete', [CitaController::class, 'medico_cita_delete'])->name('medico_cita_delete');


Route::post('/servicio/medico_index', [ServicioController::class, 'medico_index'])->name('medico_index');



