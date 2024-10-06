<head>
<title>Administradores</title>
    <style>
        .centroM{
            margin: 2% 2%;

        };
        .rounded{
            border-radius: 100%
        }
        .otros{
            display: flex
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('title','Clientes')

    @section('content')
    <h1 class="fw-bold">Prestamo</h1>
    <h5 class="fw-bold">Prestamos registrados permitidos</h5>
    <hr>
    <div>
        <div class="centroM otros">
            <a class="btn btn-success btn-sm centroM" href="/administrador/nuevoadmin">Agregar un admin</a>
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
                <th class="bg-dark text-white" >Nombre</th>
                <th class="bg-dark text-white" >Correo</th>
                <th class="bg-dark text-white" >ACCIONES</th>
            </tr>
        </thead>
    </thead>
    <tbody>
        
        <tr>
            <td>2</td>
            <td>Juanito</td>
            <td>coco@gmail.com</td>
            <td>
                <a class="btn btn-warning btn-sm text-white " href="/administrador/editaradmin">Editar</a>
                <button class="btn btn-danger btn-sm">Eliminar</button>                    
            </td>
        </tr>
        

    </tbody>

</table>
@endsection
</body>
