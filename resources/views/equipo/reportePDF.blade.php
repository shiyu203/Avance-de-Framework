<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Equipos</title>
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
    <h1>Reporte de Equipos</h1>
    <p>Fecha de generación: {{ $reporte->fecha_generacion }}</p>
    <p>ID del Reporte: {{ $reporte->id }}</p>
    <p>Generado por: {{ $admin->nombre }} ({{ $admin->correo_electronico }})</p>

    <h2>Equipos en Mantenimiento</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equiposMantenimiento as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Equipos Prestados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equiposPrestados as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Equipos Disponibles</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equiposDisponibles as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
