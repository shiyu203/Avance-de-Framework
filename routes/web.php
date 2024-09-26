<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); 
});

Route::get('/usuarios/usuarios', function () {  return view('usuarios/usuarios'); 
});

Route::get('/usuarios/nuevousuario', function () {  return view('usuarios/nuevousuario'); 
});