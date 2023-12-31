<?php

use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FinanzaController;
use App\Http\Controllers\FondoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValoracionController;
use Illuminate\Support\Facades\Route;

// LOGIN
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// REGISTRO
Route::get('/registro', [RegistroController::class, 'registro'])->name("registro");
Route::post('/registro', [RegistroController::class, 'store']);
// CONFIGURACIÓN
Route::get('/configuracion/getConfiguracion', [ConfiguracionController::class, 'getConfiguracion']);

Route::middleware(['auth'])->group(function () {
    Route::post('/configuracion/update', [ConfiguracionController::class, 'update']);

    Route::prefix('admin')->group(function () {
        // Usuarios
        Route::get('usuarios/getUsuarioTipo', [UserController::class, 'getUsuarioTipo']);
        Route::get('usuarios/getUsuario/{usuario}', [UserController::class, 'getUsuario']);
        Route::patch('usuarios/asignarConfiguracion/{usuario}', [UserController::class, 'asignarConfiguracion']);
        Route::get('usuarios/userActual', [UserController::class, 'userActual']);
        Route::get('usuarios/getInfoBox', [UserController::class, 'getInfoBox']);
        Route::get('usuarios/getPermisos/{usuario}', [UserController::class, 'getPermisos']);
        Route::get('usuarios/getEncargadosRepresentantes', [UserController::class, 'getEncargadosRepresentantes']);
        Route::post('usuarios/actualizaContrasenia/{usuario}', [UserController::class, 'actualizaContrasenia']);
        Route::post('usuarios/actualizaFoto/{usuario}', [UserController::class, 'actualizaFoto']);
        Route::resource('usuarios', UserController::class)->only([
            'index', 'store', 'update', 'destroy', 'show'
        ]);

        // empresas
        Route::resource('empresas', EmpresaController::class)->only([
            'index', 'store', 'update', 'destroy', 'show'
        ]);

        // cuestionarios
        Route::resource('cuestionarios', CuestionarioController::class)->only([
            'index', 'store', 'update', 'destroy', 'show'
        ]);

        // fondos
        Route::resource('fondos', FondoController::class)->only([
            'index', 'store', 'update', 'destroy', 'show'
        ]);

        // finanzas
        Route::put("finanzas/actualizaColumna/{finanza}", [FinanzaController::class, 'actualizaColumna'])->name("finanzas.actualizaColumna");
        Route::get("finanzas/getMedias/{empresa}", [FinanzaController::class, 'getMedias'])->name("finanzas.getMedias");
        Route::get("finanzas/getAnioAnterior/{empresa}", [FinanzaController::class, 'getAnioAnterior'])->name("finanzas.getAnioAnterior");
        Route::resource('finanzas', FinanzaController::class)->only([
            'index', 'store', 'update', 'destroy', 'show'
        ]);

        // valoracion
        Route::post("valoracions/valoracion_user/{empresa}", [ValoracionController::class, 'valoracion_user'])->name("valoracions.valoracion_user");
        Route::post("valoracions/empresa/{empresa}", [ValoracionController::class, 'empresa'])->name("valoracions.empresa");
        Route::resource('valoracions', ValoracionController::class)->only([
            'index', 'store', 'update', 'destroy', 'show'
        ]);

        // REPORTES
        Route::post('reportes/usuarios', [ReporteController::class, 'usuarios']);
        Route::post('reportes/valoracion', [ReporteController::class, 'valoracion']);
        Route::post('reportes/valoracion_users', [ReporteController::class, 'valoracion_users']);
        Route::post('reportes/g_valoracion', [ReporteController::class, 'g_valoracion']);
    });
});


// ---------------------------------------
Route::get('/{optional?}', function () {
    return view('app');
})->name('base_path')->where('optional', '.*');
