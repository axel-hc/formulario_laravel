<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Registros</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/brite/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Mensajes Recibidos</h2>
    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Volver al formulario</a>

    <table class="table table-bordered table-striped bg-white shadow-sm">
        <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <tbody>
        @forelse($mensajes as $msg)
            <tr>
                <td>{{ $msg['nombre'] }}</td>
                <td>{{ $msg['email'] }}</td>
                <td>{{ $msg['mensaje'] }}</td>
                <td>{{ $msg['fecha'] }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center">No hay mensajes aún.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>