<head>
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
    @extends('layout.app')

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
        
        <tr>
            <td>2</td>
            <td>Josue Raul Pineda Santos</td>
            <td>Proyector</td>
            <td>23/09/2024</td>
            <td>24/09/2024</td>
            <td>
                <a class="btn btn-success btn-sm ">Entregado</a>
                <button class="btn btn-sm btn-danger" style=" color: white;">Cancelar</button>
                <a class="btn btn-warning btn-sm text-white " href="/prestamo/editarprestamo">Editar</a>
                <button class="btn btn-danger btn-sm">Eliminar</button>                    
            </td>
        </tr>
        

    </tbody>

</table>
@endsection
</body>
