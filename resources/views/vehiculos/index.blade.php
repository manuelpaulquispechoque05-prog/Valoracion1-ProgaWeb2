<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vehículos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #007bff; color: #fff; }
        tr:hover { background: #f1f1f1; }
        .btn { padding: 6px 14px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px; display: inline-block; }
        .btn-edit { background: #ffc107; color: #333; }
        .btn-delete { background: #dc3545; color: #fff; }
        .btn-create { background: #28a745; color: #fff; margin-bottom: 15px; }
        .btn-create:hover { background: #218838; }
        .alert { padding: 12px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 15px; border: 1px solid #c3e6cb; }
        .actions { display: flex; gap: 6px; }
        form { display: inline; }
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
