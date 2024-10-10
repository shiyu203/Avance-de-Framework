<head>
<title>Prestamos</title>
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
    <div class="centroM otros">
        <a class="btn btn-success btn-sm centroM" href="/prestamo/nuevopresta">Agregar un prestamo</a>
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
                <th class="bg-dark text-white" >Usuario</th>
                <th class="bg-dark text-white" >Equipo</th>
                <th class="bg-dark text-white" >Fecha de prestamo</th>
                <th class="bg-dark text-white" >Fecha de devolucion</th>
                <th class="bg-dark text-white" >ACCIONES</th>
            </tr>
        </thead>
    </thead>
    <tbody>
        @foreach ($prestamos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->usuario_nombre }}</td>  <!-- Mostrar el nombre del usuario -->
                <td>{{ $item->equipo_nombre }}</td>  <!-- Mostrar el nombre del equipo -->
                <td>{{ $item->fecha_prestamo }}</td>
                <td>{{ $item->fecha_devolucion }}</td>
                <td>
                    <a class="btn btn-success btn-sm">Entregado</a>
                    <button class="btn btn-sm btn-danger" style="color: white;">Cancelar</button>
                    <a class="btn btn-warning btn-sm text-white" href="/prestamo/editarprestamo">Editar</a>
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    

</table>
@endsection
</body>
