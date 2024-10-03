<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Models\Cliente;

Route::get('/', function () { return view('home'); 
});
/**direciones de usuario */
Route::get('/usuarios/usuarios', [ClienteController::class, 'index']); 


Route::get('/usuarios/nuevousuario', function () {  return view('usuarios/nuevousuario'); 
});

Route::get('/usuarios/editarusuario', function () {  return view('usuarios/editarusuario'); 
});
/**direciones de pretamos */
Route::get('/prestamo/prestamos', function () {  return view('prestamo/prestamos'); 
});

Route::get('/prestamo/nuevopresta', function () {  return view('prestamo/nuevopresta'); 
});
Route::get('/prestamo/editarprestamo', function () {  return view('prestamo/editarprestamo'); 
});

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