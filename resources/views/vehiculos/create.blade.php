<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 500px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        label { display: block; margin-top: 12px; font-weight: bold; color: #555; }
        input { width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input:focus { border-color: #007bff; outline: none; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 15px; }
        .btn-primary { background: #007bff; color: #fff; }
        .btn-primary:hover { background: #0056b3; }
        .btn-back { background: #6c757d; color: #fff; text-decoration: none; display: inline-block; margin-top: 15px; padding: 10px 20px; border-radius: 4px; }
        .btn-back:hover { background: #5a6268; }
        .error { color: #dc3545; font-size: 13px; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrar Vehículo</h1>

        <form action="{{ route('vehiculos.store') }}" method="POST">
            @csrf

            <label for="placa">Placa</label>
            <input type="text" name="placa" id="placa" value="{{ old('placa') }}" placeholder="ABC-123">
            @error('placa')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}" placeholder="Toyota">
            @error('marca')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}" placeholder="Corolla">
            @error('modelo')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="color">Color</label>
            <input type="text" name="color" id="color" value="{{ old('color') }}" placeholder="Rojo">
            @error('color')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="propietario">Propietario</label>
            <input type="text" name="propietario" id="propietario" value="{{ old('propietario') }}" placeholder="Juan Pérez">
            @error('propietario')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" placeholder="7777-1234">
            @error('telefono')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Guardar Vehículo</button>
            <a href="{{ route('vehiculos.index') }}" class="btn-back">Cancelar</a>
        </form>
    </div>
</body>
</html>
