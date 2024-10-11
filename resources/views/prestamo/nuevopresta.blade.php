<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Préstamo</title>
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
        .mb-5 {
            margin-bottom: 3rem; /* Aumentar margen inferior */
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Registrar Préstamo')
    
    @section('content')
    
    <div class="container">
        <div class="card">
            <div class="card-header text-center bg-dark text-white">
                <h2 class="fw-bold">Registrar Préstamo</h2>
            </div>
            <div class="card-body">
                <!-- Formulario para crear un nuevo préstamo -->
                <form action="/prestamo/{{ $usuarios->id }}/nuevopresta" method="POST">
                    @csrf
                    <!-- Campo para el ID del usuario (prellenado) -->
                    <div class="form-group">
                        <input type="hidden" name="usuario_id" value="{{ $usuarios->id }}">
                        @error('usuarios_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Campo para seleccionar equipo -->
                    <div class="form-group">
                        <label for="equipo_id">Equipo:</label>
                        <select class="form-control" id="equipo_id" name="equipo_id" required>
                            <option value="">Seleccionar equipo</option>
                            @foreach ($equipos as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <!-- Fecha de Préstamo -->
                    <div class="form-group">
                        <label for="fecha_prestamo">Fecha de Préstamo:</label>
                        <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" required>
                        @error('fecha_prestamo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
    
                    <!-- Fecha de Devolución -->
                    <div class="form-group mb-5">
                        <label for="fecha_devolucion">Fecha de Devolución:</label>
                        <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion" required>
                        @error('fecha_devolucion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
    
                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-success">Registrar Préstamo</button>
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
