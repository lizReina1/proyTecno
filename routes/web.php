<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Web\TurnoController;
use App\Models\Atencion;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\EnfermeraController;
use App\Http\Controllers\EstiloController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\EstadisticaController;
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
        Route::put('/citas/{cita}', [EnfermeraController::class, 'update'])->name('enfermeria.citas.update');
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
