<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Web\TurnoController;
use App\Models\Atencion;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\EnfermeraController;
use App\Http\Controllers\EstiloController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\EstadisticaController;
use App\Http\Controllers\Web\PersonalController;
use App\Http\Controllers\Web\ServicioController;
use App\Http\Controllers\Web\UserController;
use App\Models\User;
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

    //ADMINISTRADOR
    // Gestionar Personal
    Route::prefix('admin')->group(function () {
        Route::resource('/personal', PersonalController::class)->names('personal');
        // Gestionar Servicio
        Route::resource('/servicio', ServicioController::class)->names('servicio');
        //Gestionar Turno
        Route::resource('/turno', TurnoController::class)->names('turno');
        Route::post('/turno/estado', [TurnoController::class, 'finalizarTurno'])->name('turno.finalizar');
        //Reportes
        route::resource('/estadistica', EstadisticaController::class)->names('estadistica');
    });
    Route::prefix('enfermeria')->group(function () {
        Route::resource('/citas', EnfermeraController::class)->names('enfermeria.citas');
        Route::resource('/citascreate', EnfermeraController::class)->names('enfermeria.citas.create');

        // Ruta para mostrar el formulario de edición
        Route::get('/citas/{cita}/edit', [EnfermeraController::class, 'edit'])->name('enfermeria.citas.edit');

        // Ruta para actualizar la cita
        // Route::put('/citas/{cita}', [EnfermeraController::class, 'update'])->name('enfermeria.citas.update');
        // Ruta para eliminar la cita
        Route::delete('/citas/{cita}', [EnfermeraController::class, 'destroy'])->name('enfermeria.citas.destroy');
    });
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::post('register', function (CreateNewUser $creator) {
    // Aquí va la lógica de creación de usuario

    $user = $creator->create(request()->all());
    Auth::login($user);

    // Personaliza la redirección después del registro
    return redirect('/'); // Cambia '/home' por la ruta que desees
})->name('register');
Route::post('login', function () {
    // Lógica de autenticación, por ejemplo:
    $credentials = request()->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Autenticación exitosa

        // Obtén al usuario autenticado
        $user = Auth::user();

        // Verifica el tipo de usuario y redirige en consecuencia
        if ($user->tipo == 'P') {
            return redirect('/');
        } else {
            return redirect('/dashboard'); // Cambia '/otra-ruta' por la ruta que desees
        }
    }

    // Autenticación fallida, puedes manejarlo de acuerdo a tus necesidades
    return back()->withErrors(['email' => 'Credenciales incorrectas']);
})->middleware('guest')->name('login');

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
Route::get('/cita/medico/index', [CitaController::class, 'medico_cita_index'])->name('medico_cita_index');
Route::get('/cita/create', [CitaController::class, 'medico_cita_create'])->name('medico_cita_create');
Route::post('/cita/store', [CitaController::class, 'medico_cita_store'])->name('medico_cita_store');
Route::get('/cita/medico/edit/store', [CitaController::class, 'medico_cita_edit_store'])->name('medico_cita_edit_store');
Route::post('/cita/medico/edit', [CitaController::class, 'medico_cita_edit'])->name('medico_cita_edit');
Route::delete('/cita/medico/delete/{id}', [CitaController::class, 'medico_cita_delete'])->name('medico_cita_delete');


Route::post('/servicio/medico_index', [ServicioController::class, 'medico_index'])->name('medico_index');

//********** servicios medico **********************/
Route::get('/servicio/medico/index', [ServicioController::class, 'medico_servicio_index'])->name('medico_servicio_index');
Route::get('/servicio/medico/create', [ServicioController::class, 'medico_servicio_create'])->name('medico_servicio_create');

// ********************** paciente de medico **************************************
Route::get('/paciente/medico/index', [UserController::class, 'medico_paciente_index'])->name('medico_paciente_index');

// ************************** historial medico ********************//
Route::get('/historial/medico/index', [HistorialController::class, 'medico_historial_index'])->name('medico_historial_index');
Route::get('/historial/medico/create', [HistorialController::class, 'medico_historial_create'])->name('medico_historial_create');
Route::post('/historial/medico/store', [HistorialController::class, 'medico_historial_store'])->name('medico_historial_store');
Route::get('/historial/medico/edit', [HistorialController::class, 'medico_historial_edit'])->name('medico_historial_edit');

//************* consulta medico  ***********************/
Route::get('/consulta/medico/index', [ConsultaController::class, 'medico_consulta_index'])->name('medico_consulta_index');
Route::get('/consulta/medico/create', [ConsultaController::class, 'medico_consulta_create'])->name('medico_consulta_create');
Route::post('/consulta/medico/store', [ConsultaController::class, 'medico_consulta_store'])->name('medico_consulta_store');
Route::get('/consulta/medico/index2', [ConsultaController::class, 'medico_consulta_index2'])->name('medico_consulta_index2');
Route::get('/consulta/medico/show', [ConsultaController::class, 'medico_consulta_show'])->name('medico_consulta_show');
Route::get('/consulta/medico/historia_clinica', [ConsultaController::class, 'medico_historia_clinica_report'])->name('medico_historia_clinica_report');

