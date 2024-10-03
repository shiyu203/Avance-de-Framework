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
    @extends('layout.app')

    @section('title','Nuevovliente')

    @section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center bg-dark text-white">
            <h1 class="fw-bold">Editar Usuario</h1>
        </div>
        <div class="card-body">
            <form action="tu_script.php" method="POST">
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="text">Nombre:</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="carnet">Carnet:</label>
                    <input type="text" class="form-control" id="carnet" name="carnet" required>
                </div>
                <div class="form-group">
                    <label for="role">Rol:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="estudiante">Estudiante</option>
                        <option value="otro">Docente</option>
                    </select>
                </div>
                <button class="btn btn-info text-white btn-sm" >Guardar</button>            </form>
            @endsection
        </div>
    </div>
</div>

<!-- Bootstrap JS (opcional, para funcionalidades interactivas) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>