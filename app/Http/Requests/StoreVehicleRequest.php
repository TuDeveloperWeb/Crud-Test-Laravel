<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'plate' => 'required|string|max:10|unique:vehicles,plate',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'manufacture_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'client.first_name' => 'required|string|max:100',
            'client.last_name' => 'required|string|max:100',
            'client.document_number' => 'required|string|max:20|unique:clients,document_number',
            'client.email' => 'required|email|unique:clients,email',
            'client.phone' => 'required|string|max:20'
        ];
    }
}