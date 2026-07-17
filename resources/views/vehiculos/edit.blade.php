<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; margin: 30px; background: #eef2f5; }
        .container { max-width: 520px; margin: 0 auto; background: #fff; padding: 25px 30px; border: 1px solid #d0d7de; }
        h1 { color: #2c3e50; font-size: 24px; margin-top: 0; margin-bottom: 20px; border-bottom: 2px solid #446688; padding-bottom: 10px; }
        label { display: block; margin-top: 10px; font-weight: bold; color: #444; font-size: 14px; }
        input { width: 100%; padding: 7px 8px; margin-top: 3px; border: 1px solid #bbb; box-sizing: border-box; font-size: 14px; font-family: Arial, sans-serif; }
        input:focus { border-color: #446688; background: #fafcff; outline: none; }
        .btn { padding: 9px 20px; border: 1px solid #888; cursor: pointer; font-size: 14px; margin-top: 18px; font-family: Arial, sans-serif; }
        .btn-primary { background: #2d8659; color: #fff; border-color: #24734b; }
        .btn-primary:hover { background: #24734b; }
        .btn-back { background: #f0f0f0; color: #333; text-decoration: none; display: inline-block; margin-top: 18px; padding: 9px 20px; border: 1px solid #888; font-size: 14px; margin-left: 8px; }
        .btn-back:hover { background: #e0e0e0; }
        .error { color: #cc0000; font-size: 13px; margin-top: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Vehículo</h1>

        <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="placa">Placa</label>
            <input type="text" name="placa" id="placa" value="{{ old('placa', $vehiculo->placa) }}" placeholder="ABC-123">
            @error('placa')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca', $vehiculo->marca) }}" placeholder="Toyota">
            @error('marca')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $vehiculo->modelo) }}" placeholder="Corolla">
            @error('modelo')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="color">Color</label>
            <input type="text" name="color" id="color" value="{{ old('color', $vehiculo->color) }}" placeholder="Rojo">
            @error('color')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="propietario">Propietario</label>
            <input type="text" name="propietario" id="propietario" value="{{ old('propietario', $vehiculo->propietario) }}" placeholder="Juan Pérez">
            @error('propietario')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $vehiculo->telefono) }}" placeholder="7777-1234">
            @error('telefono')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Actualizar Vehículo</button>
            <a href="{{ route('vehiculos.index') }}" class="btn-back">Cancelar</a>
        </form>
    </div>
</body>
</html>
