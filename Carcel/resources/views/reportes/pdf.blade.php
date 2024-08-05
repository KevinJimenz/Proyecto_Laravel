<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de {{ ucfirst($tipo_reporte) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .header h1 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background-color: #f4f4f4;
            text-align: left;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('imagenes/logo carcel.jpg') }}" alt="Logo de la Cárcel">
        <h1>Reporte de {{ ucfirst($tipo_reporte) }}</h1>
        <p>Fecha de inicio: {{ $fecha_inicio }} - Fecha de fin: {{ $fecha_fin }}</p>
    </div>

    <div class="title">
        <h2>Detalles del Reporte</h2>
    </div>

    <table>
        <thead>
            <tr>
                @if($tipo_reporte == 'prisioneros')
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Fecha de Ingreso</th>
                    <th>Delito Cometido</th>
                    <th>Celda Asignada</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Modificación</th>
                @else
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Número de Identificación</th>
                    <th>Relación con el Prisionero</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Modificación</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
                <tr>
                    @if($tipo_reporte == 'prisioneros')
                        <td>{{ $dato->id }}</td>
                        <td>{{ $dato->nombre_completo }}</td>
                        <td>{{ $dato->fecha_nacimiento }}</td>
                        <td>{{ $dato->fecha_ingreso }}</td>
                        <td>{{ $dato->delito_cometido }}</td>
                        <td>{{ $dato->celda_asignada }}</td>
                        <td>{{ $dato->created_at }}</td>
                        <td>{{ $dato->updated_at }}</td>
                    @else
                        <td>{{ $dato->id }}</td>
                        <td>{{ $dato->nombre_completo }}</td>
                        <td>{{ $dato->numero_identificacion }}</td>
                        <td>{{ $dato->relacion_con_prisionero }}</td>
                        <td>{{ $dato->created_at }}</td>
                        <td>{{ $dato->updated_at }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
