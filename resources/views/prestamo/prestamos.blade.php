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
    <a class="btn btn-success btn-sm" href="{{ route('mostrarFormularioPrestamo') }}">Reporte de todos préstamos</a>

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
                <th class="bg-dark text-white" >Usuario</th>
                <th class="bg-dark text-white" >Equipo</th>
                <th class="bg-dark text-white" >Fecha de prestamo</th>
                <th class="bg-dark text-white" >Fecha de devolucion</th>
                <th class="bg-dark text-white" >Estado</th>
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
                <td>{{ $item->estado }}</td>
                <td>
                    <a href="{{ route('prestamo.entregado', $item->id) }}" class="btn btn-success btn-sm">Entregado</a>
                    <button class="btn btn-sm btn-danger" style="color: white;">Cancelar</button>
                    <a class="btn btn-warning btn-sm text-white" href="/prestamo/{{ $item->id }}/editarprestamo">Editar</a>
                    <button class="btn btn-danger btn-sm" url="/prestamo/destroy/{{$item->id}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    

</table>
@endsection
@section('scripts')
{{-- SweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- JS --}}
<script src="{{ asset('js/product.js') }}"></script>
@endsection
</body>
