<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vehículos</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; margin: 30px; background: #eef2f5; }
        .container { max-width: 920px; margin: 0 auto; background: #fff; padding: 25px 30px; border: 1px solid #d0d7de; }
        h1 { color: #2c3e50; font-size: 24px; margin-top: 0; margin-bottom: 20px; border-bottom: 2px solid #446688; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 14px; }
        th, td { padding: 8px 10px; text-align: left; border: 1px solid #ccc; }
        th { background: #446688; color: #fff; font-weight: bold; }
        td { background: #fff; }
        tr:nth-child(even) td { background: #f8f9fa; }
        tr:hover td { background: #e8f0fe; }
        .btn { padding: 6px 14px; border: 1px solid #888; cursor: pointer; text-decoration: none; font-size: 13px; display: inline-block; color: #333; background: #f0f0f0; }
        .btn:hover { background: #e0e0e0; }
        .btn-edit { background: #fff3cd; border-color: #e6c952; color: #6b5300; }
        .btn-edit:hover { background: #ffeaa7; }
        .btn-delete { background: #f8d7da; border-color: #d6a8ab; color: #721c24; }
        .btn-delete:hover { background: #f1c0c5; }
        .btn-create { background: #d4edda; border-color: #8fc99b; color: #155724; margin-bottom: 15px; padding: 8px 18px; font-size: 14px; }
        .btn-create:hover { background: #c3e6cb; }
        .alert { padding: 10px 15px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 15px; font-size: 14px; }
        .actions { white-space: nowrap; }
        form { display: inline; }
        p { font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vehículos Registrados</h1>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <a href="{{ route('vehiculos.create') }}" class="btn btn-create">+ Registrar Vehículo</a>

        @if ($vehiculos->isEmpty())
            <p style="color: #666; margin-top: 20px;">No hay vehículos registrados.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Propietario</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehiculos as $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->id }}</td>
                            <td>{{ $vehiculo->placa }}</td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->color }}</td>
                            <td>{{ $vehiculo->propietario }}</td>
                            <td>{{ $vehiculo->telefono }}</td>
                            <td class="actions">
                                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-edit">Editar</a>
                                <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este vehículo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
