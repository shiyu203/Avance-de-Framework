<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Nuevo Usuario</title>
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

    @section('title','Nuevovliente')

    @section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center bg-dark text-white">
            <h1 class="fw-bold">Agregar Nuevo Usuario</h1>
        </div>
        <div class="card-body">
            <form action="/usuarios/usuarios" method="POST">
                @csrf  <!-- Esto genera el token CSRF necesario -->
                <div class="form-group">
                    <label for="text">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"   maxlength="22" required>
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="correo_electronico" required>
                    @error('correo_electronico')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="carnet">Carnet:</label>
                    <input type="text" class="form-control" id="carnet" name="carnet_dui"  required>
                    @error('carnet_dui')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Rol:</label>
                    <select class="form-control" id="role" name="rol" required>
                        <option value="estudiante">Estudiante</option>
                        <option value="docente">Docente</option>
                    </select>
                    @error('rol')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-info text-white btn-sm">Guardar</button>
            </form>
            
            @endsection
        </div>
    </div>
</div>
<script>
    document.getElementById('nombre').addEventListener('input', function (event) {
        const regex = /^[a-zA-Z\s]*$/;  // Solo letras y espacios permitidos
        const nombreInput = event.target;

        if (!regex.test(nombreInput.value)) {
            nombreInput.setCustomValidity("El nombre solo puede contener letras y espacios, sin números ni caracteres especiales.");
        } else {
            nombreInput.setCustomValidity("");  // Si es válido, restablecemos el mensaje
        }

        if (nombreInput.value.length > 22) {
            nombreInput.value = nombreInput.value.substring(0, 22);  // Cortamos el valor si supera los 22 caracteres
        }
    });
</script>
<!-- Bootstrap JS (opcional, para funcionalidades interactivas) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>