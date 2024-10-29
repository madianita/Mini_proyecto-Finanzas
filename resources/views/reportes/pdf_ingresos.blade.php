<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ingresos</title>
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

    <h1>Reporte de Ingresos</h1>

    @if($ingresos->isEmpty())
        <p>No hay ingresos para mostrar.</p>
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
                @foreach($ingresos as $ingreso)
                    <tr>
                        <td>{{ '$' . number_format($ingreso->monto, 2, ',', '.') }}</td>
                        <td>{{ $ingreso->fecha }}</td>
                        <td>{{ $ingreso->descripcion }}</td>
                        <td>{{ $ingreso->categoria->nombre ?? 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


</body>
</html>
