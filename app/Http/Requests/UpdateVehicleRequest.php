<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
{
    $vehicleId = $this->route('vehicle');
    $vehicle = Vehicle::findOrFail($vehicleId);
    $clientId = $vehicle->client_id;

    $rules = [
        'plate' => 'sometimes|string|max:10|unique:vehicles,plate,'.$vehicleId,
        'brand' => 'sometimes|string|max:50',
        'model' => 'sometimes|string|max:50',
        'manufacture_year' => 'sometimes|integer|min:1900|max:'.(date('Y') + 1),
    ];

    // Solo aplica validación unique si los campos del cliente están presentes en la solicitud
    if ($this->has('client')) {
        $rules['client.first_name'] = 'sometimes|string|max:100';
        $rules['client.last_name'] = 'sometimes|string|max:100';
        
        if ($this->input('client.document_number') !== $vehicle->client->document_number) {
            $rules['client.document_number'] = 'sometimes|string|max:20|unique:clients,document_number,'.$clientId;
        }
        
        if ($this->input('client.email') !== $vehicle->client->email) {
            $rules['client.email'] = 'sometimes|email|unique:clients,email,'.$clientId;
        }
        
        $rules['client.phone'] = 'sometimes|string|max:20';
    }

    return $rules;

}

}