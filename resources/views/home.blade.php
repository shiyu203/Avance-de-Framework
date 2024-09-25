<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
</head>
<body>
    @extends('layout.app') 
    {{-- Definimos el título --}}
    @section('title', 'Inicio') 
    {{-- Definimos el contenido --}}
    @section('content') 
     <h1>Inicio</h1>
     <h5>Inicio donde inicia todo</h5>
    @endsection
</body>
</html>