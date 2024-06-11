<?php

use App\Http\Controllers\EntrantesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\SalientesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas que requieren autenticación
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    // Rutas de gestión
    Route::prefix('gestion')->group(function(){
        Route::get('/', [GestionController::class, 'index'])->name('gestion.index'); 
        Route::get('alta', [GestionController::class, 'create'])->name('gestion.altabeneficiario');
        Route::post('alta', [GestionController::class, 'store'])->name('gestion.store');
        Route::get('actualizar', function () {
            return view('gestion.modificarbeneficiario');
        })->name('gestion.actualizar');
        Route::post('actualizar', [GestionController::class, 'buscar'])->name('gestion.buscar.beneficiario');
        Route::put('actualizar/{id}', [GestionController::class, 'update'])->name('gestion.actualizar.beneficiario');
        Route::get('/error', [GestionController::class, 'error'])->name('gestion.error');
        Route::get('/errorContacto', [GestionController::class, 'errorContacto'])->name('gestion.error.contacto');
        Route::get('/contactos', [GestionController::class, 'contactos'])->name('gestion.contactos');
        Route::post('/contactos', [GestionController::class, 'contactosbusqueda'])->name('gestion.contactos.buscar');
        Route::get('/contactos/crear', [GestionController::class, 'crearcontactos'])->name('gestion.crear.contactos');
        Route::post('/contactos/crear', [GestionController::class, 'crearContacto'])->name('gestion.crear.contactos.post');

    });

    // Rutas de entrantes
    Route::prefix('entrantes')->group(function(){
        Route::get('/', [EntrantesController::class, 'index'])->name('entrantes.index');
        Route::get('/register', [EntrantesController::class, 'create'])->name('entrantes.create');
        Route::get('/cita', [EntrantesController::class, 'register'])->name('entrantes.cita');
        Route::post('/cita', [EntrantesController::class, 'registrarcita'])->name('entrantes.rescita');
        Route::post('/store', [EntrantesController::class, 'store'])->name('entrantes.store');
        Route::get('/error', [EntrantesController::class, 'error'])->name('entrantes.error');
    });

    // Rutas de salientes
    Route::prefix('salientes')->group(function(){
        Route::get('/', [SalientesController::class, 'index'])->name('salientes.index');
        Route::get('/register', [SalientesController::class, 'create'])->name('salientes.create');
        Route::post('/', [SalientesController::class, 'store'])->name('salientes.store');
    });

    // Rutas de informes
    Route::prefix('informes')->group(function(){
        Route::get('/', [InformesController::class, 'index'])->name('informes.index');
        Route::get('/beneficiarios', [InformesController::class, 'beneficiarios'])->name('informes.beneficiarios');
        Route::post('/beneficiarios/buscar', [InformesController::class, 'buscarBeneficiario'])->name('informes.beneficiarios.buscar');
    });
    
});

    // Rutas de registro
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
// Ruta de inicio
