<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Préstamos</title>
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
    <h1>Reporte de Préstamos</h1>
    <p>Fecha de generación: {{ $reporte->fecha_generacion }}</p>
    <p>ID del Reporte: {{ $reporte->id }}</p>
    <p>Generado por: {{ $admin->nombre }} ({{ $admin->correo_electronico }})</p>

    <h2>Préstamos Actuales</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Usuario</th>
                <th>Nombre del Equipo</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->usuario->nombre ?? 'No disponible' }}</td>
                    <td>{{ $prestamo->equipo->nombre ?? 'No disponible' }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_devolucion ?? 'No disponible' }}</td>
                    <td>{{ $prestamo->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
