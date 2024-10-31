<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reporte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Generar Reporte de Usuarios')

    @section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center bg-dark text-white">
                <h1 class="fw-bold">Generar Reporte de Usuarios</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('generarReporte') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="admin_id">Selecciona un administrador:</label>
                        <select name="admin_id" id="admin_id" class="form-control" required>
                            <option value="" disabled selected>Elige un administrador</option>
                            @foreach($administradores as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Generar Reporte</button>
                </form>
        </div>
    </div>
    @endsection
</body>
</html>
