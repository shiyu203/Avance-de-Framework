<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Editar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 15px 15px 0 0;
        }
        h2 {
            font-size: 1.5rem;
            margin: 0;
        }
        .btn-custom {
            background-color: #6f42c1;
            border-color: #6f42c1;
            padding: 0.2rem 0.4rem;
        }
        .btn-custom:hover {
            background-color: #5a32a1;
            border-color: #5a32a1;
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Editar Usuario')

    @section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center bg-dark text-white">
                <h1 class="fw-bold">Editar Usuario</h1>
            </div>
            <div class="card-body">
                <form action="/usuarios/{{ $usuarios->id }}/editarusuario" method="POST">
                    @csrf
                    @method('PUT') 

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" maxlength="22" required value="{{ $usuarios->nombre }}">
                        @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="correo_electronico">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required value="{{ $usuarios->correo_electronico }}">
                        @error('correo_electronico')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="carnet_dui">Carnet:</label>
                        <input type="text" class="form-control" id="carnet_dui" name="carnet_dui" required value="{{ $usuarios->carnet_dui }}">
                        @error('carnet_dui')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rol">Rol:</label>
                        <select class="form-control" id="rol" name="rol" required>
                            <option value="estudiante" {{ $usuarios->rol == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                            <option value="docente" {{ $usuarios->rol == 'docente' ? 'selected' : '' }}>Docente</option>
                        </select>
                        @error('rol')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-info text-white btn-sm">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
