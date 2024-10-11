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
    @extends('layouts.app')

    @section('title','Clientes')

    @section('content')
    <h1 class="fw-bold">Clientes</h1>
    <h5 class="fw-bold">Usuarios registrados permitidos y no permitidos</h5>
    <hr>
   
    <div class="centroM otros">
            <a class="btn btn-success btn-sm centroM" href="/usuarios/nuevousuario">Agregar un cliente</a>
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
                <th class="bg-dark text-white" >correo</th>
                <th class="bg-dark text-white" >DUI o carnet</th>
                <th class="bg-dark text-white" >Rol</th>
                <th class="bg-dark text-white" >Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                @foreach ($usuarios as $item) 
                <tr>
                <td>{{ $item->id}}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->correo_electronico }}</td>
                <td>{{ $item->carnet_dui}}</td>
                <td>{{ $item->rol}}</td>
                <td>
                    <div>
                        <a class="btn btn-success text-white btn-sm" href="/prestamo/{{ $item->id }}/nuevopresta">Prestar</a>
                            <a class="btn btn-warning btn-sm text-white" href="/usuarios/{{ $item->id }}/editarusuario">Editar</a>
                        <button class="btn btn-sm btn-danger" style="; color: white;">Bloquear</button>
                        <button class="btn btn-danger btn-sm" url="/usuarios/destroy/{{$item->id}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
                        <button class="btn btn-success btn-sm centroM" href="/reportes/nuevoreporte">PDF</button>
                    </div>
                </td>
            </tr>
            

        </tbody>
        @endforeach
    </table>
    <br>
    <hr>
    <h2 class="fw-bold">Usuarios no permitidos</h2>
    <table class="table table-striped table-bordered mt-2">
        <thead>
        <tr>
            <th class="bg-danger text-white" >ID</th>
            <th class="bg-danger text-white" >Nombre</th>
            <th class="bg-danger text-white" >Correo</th>
            <th class="bg-danger text-white" >DUI o carnet</th>
            <th class="bg-danger text-white" >Rol</th>
            <th class="bg-danger text-white" >Acciones</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>2</td>
            <td>Josue Raul Pineda Santos</td>
            <td>itca@gmail.com</td>
            <td>3456454-4</td>
            <td>estudiante</td>
            <td>
                <button class="btn btn-success text-white btn-sm">Quitar</button>                  
            </td>
        </tr>
        

    </tbody>
</table>
    </div>
    
    @endsection

    @section('scripts')
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/product.js') }}"></script>
    @endsection
</body>

</html>