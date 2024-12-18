<head>
<title>equipo</title>
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
    <h1 class="fw-bold">Equipos</h1>
    <h5 class="fw-bold">Equipos registrados</h5>
    <hr>
    <div>
        <a class="btn btn-success btn-sm" href="{{ route('mostrarFormularioEquipos') }}">Reporte de todos Equipos</a>
        <div class="centroM otros">
            <a class="btn btn-success btn-sm centroM" href="/equipo/nuevoequipo">Agregar un equipo</a>
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
                <th class="bg-dark text-white" >Descripcion</th>
                <th class="bg-dark text-white" >Detalles Tec.</th>
                <th class="bg-dark text-white" >Estado</th>
                <th class="bg-dark text-white" >ACCIONES</th>
            </tr>
        </thead>
    </thead>
    <tbody>
        
        <tr>
        @foreach ($equipos as $item) 
            <td>{{ $item->id}}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->descripcion }}</td>
            <td>{{ $item->detalles_tecnicos}}</td>
            <td>{{ $item->estado}}</td>
            <td>
                <a class="btn btn-warning btn-sm text-white" href="/equipo/{{ $item->id }}/editarequipo">Editar</a>
   
                <button class="btn btn-danger btn-sm" url="/equipo/destroy/{{$item->id}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
            </td>
        </tr>
        

    </tbody>
    @endforeach

</table>
@endsection
@section('scripts')
{{-- SweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- JS --}}
<script src="{{ asset('js/product.js') }}"></script>
@endsection
</body>
