<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository
{
    public function getAllWithClient()
    {
        return Vehicle::with('client')->get();
    }

    public function findById(string $id)
    {
        return Vehicle::findOrFail($id);
    }

    public function findByIdWithClient(string $id)
    {
        return Vehicle::with('client')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Vehicle::create($data);
    }

    public function update(Vehicle $vehicle, array $data)
    {
        return $vehicle->update($data);
    }

    public function delete(Vehicle $vehicle)
    {
        return $vehicle->delete();
    }
}