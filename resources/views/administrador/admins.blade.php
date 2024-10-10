<head>
    <title>Administradores</title>
        <style>
            .centroM {
                margin: 2% 2%;
            }
            .rounded {
                border-radius: 100%;
            }
            .otros {
                display: flex;
            }
        </style>
    </head>
    <body>
        @extends('layouts.app')
    
        @section('title','Administradores')
    
        @section('content')
        <h1 class="fw-bold">Administradores</h1> <!-- Corregido el cierre de la etiqueta -->
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
                    <th class="bg-dark text-white">ID</th>
                    <th class="bg-dark text-white">Nombre</th>
                    <th class="bg-dark text-white">Correo</th>
                    <th class="bg-dark text-white">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($administradores as $item) <!-- Inicio del bucle -->
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->correo_electronico }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm text-white" href="/administrador/{{ $item->id }}/editaradmin">Editar</a>
                        <button class="btn btn-danger btn-sm" url="/administrador/destroy/{{$item->id}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
                    </td>
                </tr>
                @endforeach <!-- Cierre del bucle -->
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
    
