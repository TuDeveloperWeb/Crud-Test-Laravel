<?php

namespace App\Services;

use App\Repositories\VehicleRepository;
use App\Repositories\ClientRepository;

class VehicleService
{
    private VehicleRepository $vehicleRepository;
    private ClientRepository $clientRepository;

    public function __construct(
        VehicleRepository $vehicleRepository,
        ClientRepository $clientRepository
    ) {
        $this->vehicleRepository = $vehicleRepository;
        $this->clientRepository = $clientRepository;
    }

    public function getAllVehicles()
    {
        return $this->vehicleRepository->getAllWithClient();
    }

    public function getVehicleById(string $id)
    {
        return $this->vehicleRepository->findByIdWithClient($id);
    }

    public function createVehicle(array $data)
    {
        $client = $this->clientRepository->create([
            'first_name' => $data['client']['first_name'],
            'last_name' => $data['client']['last_name'],
            'document_number' => $data['client']['document_number'],
            'email' => $data['client']['email'],
            'phone' => $data['client']['phone']
        ]);

        $vehicle = $this->vehicleRepository->create([
            'plate' => $data['plate'],
            'brand' => $data['brand'],
            'model' => $data['model'],
            'manufacture_year' => $data['manufacture_year'],
            'client_id' => $client->id
        ]);

        return [
            'vehicle' => $vehicle,
            'client' => $client
        ];
    }

    public function updateVehicle(string $id, array $data)
    {
        $vehicle = $this->vehicleRepository->findById($id);
        
        if (isset($data['plate'])) {
            $this->vehicleRepository->update($vehicle, [
                'plate' => $data['plate'],
                'brand' => $data['brand'] ?? $vehicle->brand,
                'model' => $data['model'] ?? $vehicle->model,
                'manufacture_year' => $data['manufacture_year'] ?? $vehicle->manufacture_year,
            ]);
            
        }

        if (isset($data['client'])) {
            $this->clientRepository->update($vehicle->client, [
                'first_name' => $data['client']['first_name'] ?? $vehicle->client->first_name,
                'last_name' => $data['client']['last_name'] ?? $vehicle->client->last_name,
                'document_number' => $data['client']['document_number'] ?? $vehicle->client->document_number,
                'email' => $data['client']['email'] ?? $vehicle->client->email,
                'phone' => $data['client']['phone'] ?? $vehicle->client->phone,
            ]);
        }

        return $this->vehicleRepository->findByIdWithClient($id);
    }

    public function deleteVehicle(string $id)
    {
        $vehicle = $this->vehicleRepository->findById($id);
        $this->clientRepository->delete($vehicle->client);
        $this->vehicleRepository->delete($vehicle);
    }
}