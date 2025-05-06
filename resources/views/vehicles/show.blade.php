@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Detalle del Vehículo</h2>
        <div>
            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar este vehículo?')">Eliminar</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Datos del Vehículo</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Placa:</strong> {{ $vehicle->plate }}</li>
                    <li class="list-group-item"><strong>Marca:</strong> {{ $vehicle->brand }}</li>
                    <li class="list-group-item"><strong>Modelo:</strong> {{ $vehicle->model }}</li>
                    <li class="list-group-item"><strong>Año de Fabricación:</strong> {{ $vehicle->manufacture_year }}</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Datos del Cliente</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $vehicle->client->first_name }}</li>
                    <li class="list-group-item"><strong>Apellidos:</strong> {{ $vehicle->client->last_name }}</li>
                    <li class="list-group-item"><strong>Documento:</strong> {{ $vehicle->client->document_number }}</li>
                    <li class="list-group-item"><strong>Correo:</strong> {{ $vehicle->client->email }}</li>
                    <li class="list-group-item"><strong>Teléfono:</strong> {{ $vehicle->client->phone }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
</div>
@endsection