<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Egresos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Reporte de Egresos</h1>

    @if($egresos->isEmpty())
        <p>No hay egresos para mostrar.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach($egresos as $egreso)
                    <tr>
                        <td>{{ '$' . number_format($egreso->monto, 2, ',', '.') }}</td>
                        <td>{{ $egreso->fecha }}</td>
                        <td>{{ $egreso->descripcion }}</td>
                        <td>{{ $egreso->categoria->nombre ?? 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


</body>
</html>
