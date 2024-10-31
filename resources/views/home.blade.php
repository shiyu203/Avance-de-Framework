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
    @extends('layouts.app') 
    {{-- Definimos el título --}}
    @section('title', 'Inicio') 
    {{-- Definimos el contenido --}}
    @section('content') 
    <h1>Bienvenidos</h1>
    @endsection
</body>
</html>