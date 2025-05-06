@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Listado de Vehículos</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Nuevo Vehículo</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->plate }}</td>
                <td>{{ $vehicle->brand }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->manufacture_year }}</td>
                <td>{{ $vehicle->client->first_name }} {{ $vehicle->client->last_name }}</td>
                <td>
                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este vehículo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection