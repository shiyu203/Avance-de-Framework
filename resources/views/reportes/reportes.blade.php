<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de Reportes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

    @section('title', 'Reportes')

    @section('content')
    <h1 class="fw-bold">Listado de Reportes</h1>
    <hr>
    
    <div class="centroM">
        <table class="table table-striped table-bordered mt-2">
            <thead>
                <tr>
                    <th class="bg-dark text-white">ID del Reporte</th>
                    <th class="bg-dark text-white">Nombre del Administrador</th>
                    <th class="bg-dark text-white">Tipo</th>
                    <th class="bg-dark text-white">Fecha de Generación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportes as $reporte)
                    <tr>
                        <td>{{ $reporte->id }}</td>
                        <td>{{ $reporte->administrador->nombre }}</td>
                        <td>{{ $reporte->tipo }}</td>
                        <td>{{ $reporte->fecha_generacion }}</td>
                    </tr>
                @endforeach
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
