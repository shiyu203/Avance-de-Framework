<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Préstamo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo claro */
        }
        .card {
            margin-top: 50px; /* Espacio en la parte superior */
            border: none; /* Sin borde */
            border-radius: 15px; /* Bordes redondeados */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra */
        }
        .card-header {
            background-color: #007bff; /* Color de fondo del encabezado */
            color: white; /* Color del texto */
            border-radius: 15px 15px 0 0; /* Bordes redondeados solo en la parte superior */
        }
        h2 {
            font-size: 1.5rem; /* Reducir el tamaño del título */
            margin: 0; /* Eliminar márgenes */
        }
        .btn-custom {
            background-color: #6f42c1; /* Color morado */
            border-color: #6f42c1; /* Color del borde */
            padding: 0.2rem 0.4rem; /* Reducir aún más el tamaño del botón */
        }
        .btn-custom:hover {
            background-color: #5a32a1; /* Color más oscuro al pasar el ratón */
            border-color: #5a32a1; /* Color del borde más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('title','Clientes')

    @section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-center bg-dark text-white">
            <h2 class="fw-bold">Editar Equipos</h2>
        </div>
        <div class="card-body">
            <form action="/equipo/{{ $equipos->id }}/editarequipo" method="POST">
                @csrf
                @method('PUT') 

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="{{$equipos->nombre}}">
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required value="{{$equipos->descripcion}}"></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="detalles_tecnicos">Detalles Técnicos:</label>
                    <textarea class="form-control" id="detalles_tecnicos" name="detalles_tecnicos" rows="3" required value="{{$equipos->detalles_tecnicos}}" ></textarea>
                    @error('detalles_tecnicos')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="disponible" {{ $equipos->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="mantenimiento" {{ $equipos->estado == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                        <option value="prestado"{{ $equipos->estado == 'prestado' ? 'selected' : '' }}>Prestado</option>
                    </select>
                    @error('estado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                <button type="submit" class="btn btn-info text-white btn-sm">Agregar Préstamo</button>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Bootstrap JS (opcional, para funcionalidades interactivas) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>