<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Todos los Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Reporte de Todos los Usuarios</h1>
    <p>Fecha de generación: {{ $reporte->fecha_generacion }}</p>
    <p>ID del Reporte: {{ $reporte->id }}</p>
    <p>Generado por: {{ $admin->nombre }} ({{ $admin->correo_electronico }})</p>

    <h2>Usuarios Autorizados</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Carnet DUI</th>
                <th>Rol</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuariosAutorizados as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->correo_electronico }}</td>
                    <td>{{ $usuario->carnet_dui }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>{{ $usuario->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Usuarios Bloqueados</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Carnet DUI</th>
                <th>Rol</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuariosBloqueados as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->correo_electronico }}</td>
                    <td>{{ $usuario->carnet_dui }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>{{ $usuario->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
