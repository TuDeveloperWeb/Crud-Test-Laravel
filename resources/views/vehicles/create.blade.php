@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Registrar Nuevo Vehículo</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <h4 class="mb-3">Datos del Vehículo</h4>
                    
                    <div class="mb-3">
                        <label for="plate" class="form-label">Placa</label>
                        <input type="text" class="form-control @error('plate') is-invalid @enderror" id="plate" name="plate" value="{{ old('plate') }}">
                        @error('plate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="brand" class="form-label">Marca</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}">
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}">
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="manufacture_year" class="form-label">Año de Fabricación</label>
                        <input type="number" class="form-control @error('manufacture_year') is-invalid @enderror" id="manufacture_year" name="manufacture_year" value="{{ old('manufacture_year') }}">
                        @error('manufacture_year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h4 class="mb-3">Datos del Cliente</h4>
                    
                    <div class="mb-3">
                        <label for="client_first_name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('client.first_name') is-invalid @enderror" id="client_first_name" name="client[first_name]" value="{{ old('client.first_name') }}">
                        @error('client.first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="client_last_name" class="form-label">Apellidos</label>
                        <input type="text" class="form-control @error('client.last_name') is-invalid @enderror" id="client_last_name" name="client[last_name]" value="{{ old('client.last_name') }}">
                        @error('client.last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="client_document_number" class="form-label">Número de Documento</label>
                        <input type="text" class="form-control @error('client.document_number') is-invalid @enderror" id="client_document_number" name="client[document_number]" value="{{ old('client.document_number') }}">
                        @error('client.document_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="client_email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control @error('client.email') is-invalid @enderror" id="client_email" name="client[email]" value="{{ old('client.email') }}">
                        @error('client.email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="client_phone" class="form-label">Teléfono</label>
                        <input type="text" class="form-control @error('client.phone') is-invalid @enderror" id="client_phone" name="client[phone]" value="{{ old('client.phone') }}">
                        @error('client.phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('vehicles.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection