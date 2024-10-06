<head>
<title>Reportes</title>
</head>
@extends('layouts.app')

@section('title','Clientes')

@section('content')
<h1 class="fw-bold">Reportes</h1>
<h5 class="fw-bold">Lista de todos los reportes</h5>
<hr>
<div>
    <div class="centroM otros">
        <div style="margin-left: auto;">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-dark" type="submit">Buscar</button>
        </form>
    </div>
</div>
<div class="centroM">
    <table class="table table-striped table-bordered mt-2">
        <thead>
        <tr>
            <th class="bg-dark text-white" >ID</th>
            <th class="bg-dark text-white" >Prestamo</th>
            <th class="bg-dark text-white" >Equipo</th>
            <th class="bg-dark text-white" >Fecha de reportes</th>
            <th class="bg-dark text-white" >Descripcion</th>
            <th class="bg-dark text-white" >Admin</th>
            <th class="bg-dark text-white" >ACCIONES</th>
        </tr>
    </thead>
</thead>
<tbody>
    
    <tr>
        <td>2</td>
        <td>3</td>
        <td>laptop</td>
        <td>32/12/2024</td>
        <td>rpeote de el equipo que se presto</td>
        <td>Josue Pineda</td>

        <td>
            <a class="btn btn-warning btn-sm text-white " href="/reportes/nuevoreporte">Editar</a>
            <button class="btn btn-danger btn-sm">Eliminar</button>                    
        </td>
    </tr>
    

</tbody>

</table>
@endsection