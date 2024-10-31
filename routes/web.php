<?php
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdministradoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PrestamoController;
use App\Models\Administradores;
use App\Models\Cliente;
use App\Models\Prestamo;
use App\Models\Equipo;
use App\Models\Reporte;


Route::get('/home', function () { return view('home'); 
});
/**direciones de usuario */
Route::get('/usuarios/usuarios', [ClienteController::class, 'index']); 
Route::get('/usuarios/usuariosbloqueados', [ClienteController::class, 'bloqueados']); 

// Ruta para mostrar la vista create.blade.php
Route::get('/usuarios/nuevousuario', [ClienteController::class, 'create']); 
// Ruta para mostrar la vista update.blade.php
Route::get('/usuarios/{usuarios}/editarusuario', [ClienteController::class, 'edit'])->name('usuarios.edit');
// Ruta para insertar usario
Route::post('/usuarios/usuarios', [ClienteController::class, 'store']); 
// Ruta para modificar usario
Route::put('/usuarios/{usuarios}/editarusuario', [ClienteController::class, 'update']); 

Route::put('/usuarios/{id}/bloquear', [ClienteController::class, 'bloquear'])->name('usuarios.bloquear');
Route::put('/usuarios/{id}/quitar-bloqueo', [ClienteController::class, 'quitarBloqueo'])->name('usuarios.quitar-bloqueo');



// Ruta para eliminar usario
Route::delete('/usuarios/destroy/{id}', [ClienteController::class, 'destroy']); 




/**equipos rutas */
/**asddddddddddddddddddddddd */

/**direciones de usuario */
Route::get('/equipo/equipos', [EquipoController::class, 'index']); 

// Ruta para mostrar la vista create.blade.php
Route::get('/equipo/nuevoequipo', [EquipoController::class, 'create']); 
// Ruta para mostrar la vista update.blade.php
Route::get('/equipo/{equipos}/editarequipo', [EquipoController::class, 'edit'])->name('equipos.edit');
// Ruta para insertar usario
Route::post('/equipo/equipos', [EquipoController::class, 'store']); 
// Ruta para modificar usario
Route::put('/equipo/{equipos}/editarequipo', [EquipoController::class, 'update']); 
// Ruta para eliminar usario
Route::delete('/equipo/destroy/{id}', [EquipoController::class, 'destroy']); 

Route::get('/equipo/reporteequipos', [ReportController::class, 'mostrarFormularioEquipos'])->name('mostrarFormularioEquipos');
Route::post('/equipo/generarReporteEquipos', [ReportController::class, 'generarReporteEquipos'])->name('generarReporteEquipos');


/**asddddddddddddddddddddddd */

/**direciones de administradores*/
Route::get('/administrador/admins', [AdministradoresController::class, 'index']); 

// Ruta para mostrar la vista create.blade.php
Route::get('/administrador/nuevoadmin', [AdministradoresController::class, 'create']); 
// Ruta para mostrar la vista update.blade.php
Route::get('/administrador/{administradores}/editaradmin', [AdministradoresController::class, 'edit']);
// Ruta para insertar usario
Route::post('/administrador/admins', [AdministradoresController::class, 'store']); 
// Ruta para modificar usario
Route::put('/administrador/{administradores}/editaradmin', [AdministradoresController::class, 'update']); 
// Ruta para eliminar usario
Route::delete('/administrador/destroy/{id}', [AdministradoresController::class, 'destroy']); 


/**asddddddddddddddddddddddd */

Route::get('/prestamo/prestamos', [PrestamoController::class, 'index']);   
Route::get('/prestamo/prestamosen', [PrestamoController::class, 'entrega']); 


// Ruta para crear un nuevo préstamo
Route::get('/prestamo/{usuarios}/nuevopresta', [PrestamoController::class, 'create'])->name('prestamos.nuevopresta');
// Ruta para insertar usario
Route::post('/prestamo/{usuarios}/nuevopresta', [PrestamoController::class, 'store'])->name('prestamos.store');
// Ruta para editar
Route::get('/prestamo/{prestamos}/editarprestamo', [PrestamoController::class, 'edit']);

// Ruta para actualizar
Route::put('/prestamo/{prestamos}/editarprestamo', [PrestamoController::class, 'update']);

Route::get('/prestamo/{id}/entregado', [PrestamoController::class, 'marcarComoEntregado'])->name('prestamo.entregado');


Route::delete('/prestamo/destroy/{id}', [PrestamoController::class, 'destroy']); 


// Mostrar el formulario para generar el reporte de préstamos
Route::get('/prestamos/reporteprestamo', [ReportController::class, 'mostrarFormularioPrestamo'])->name('mostrarFormularioPrestamo');

// Generar el reporte de préstamos
Route::post('/prestamos/generar-reporte', [ReportController::class, 'generarReportePrestamo'])->name('generarReportePrestamo');


/**equipos rutas */
/**asddddddddddddddddddddddd */



Route::get('/reportes/reportes', [ReportController::class, 'mostrarReportes'])->name('mostrarReportes');


Route::get('/usuarios/reporte', [ReportController::class, 'mostrarFormulario'])->name('mostrarFormulario');
Route::post('/usuarios/generar-reporte', [ReportController::class, 'generarReporte'])->name('generarReporte');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
