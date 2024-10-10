<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Models\Cliente;

Route::get('/home', function () { return view('home'); 
});
/**direciones de usuario */
Route::get('/usuarios/usuarios', [ClienteController::class, 'index']); 

// Ruta para mostrar la vista create.blade.php
Route::get('/usuarios/nuevousuario', [ClienteController::class, 'create']); 
// Ruta para mostrar la vista update.blade.php
Route::get('/usuarios/{usuarios}/editarusuario', [ClienteController::class, 'edit'])->name('usuarios.edit');
// Ruta para insertar usario
Route::post('/usuarios/usuarios', [ClienteController::class, 'store']); 
// Ruta para modificar usario
Route::put('/usuarios/{usuarios}/editarusuario', [ClienteController::class, 'update']); 
// Ruta para eliminar usario
Route::delete('/usuarios/destroy/{id}', [ClienteController::class, 'destroy']); 





/**direciones de pretamos */
Route::get('/equipo/equipos', function () {  return view('equipo/equipos'); 
});

Route::get('/equipo/nuevoequipo', function () {  return view('equipo/nuevoequipo'); 
});
Route::get('/equipo/editarequipo', function () {  return view('equipo/editarequipo'); 
});

/**direciones de administrador */
Route::get('/administrador/admins', function () {  return view('administrador/admins'); 
});

Route::get('/administrador/nuevoadmin', function () {  return view('administrador/nuevoadmin'); 
});
Route::get('/administrador/editaradmin', function () {  return view('administrador/editaradmin'); 
});

/**reportes */
Route::get('/reportes/reportes', function () {  return view('reportes/reportes'); 
});

Route::get('/reportes/nuevoreporte', function () {  return view('reportes/nuevoreporte'); 
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
