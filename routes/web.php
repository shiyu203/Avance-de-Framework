<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); 
});

Route::get('/usuarios/show', function () { return view('usuarios/usuarios'); }); 

Route::get('/usuarios/create', function () { return view('usuarios/nuevousuario'); }); 
