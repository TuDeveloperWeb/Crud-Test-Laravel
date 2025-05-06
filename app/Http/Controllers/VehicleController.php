<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Services\VehicleService;

class VehicleController extends Controller
{
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function index()
    {
        $vehicles = $this->vehicleService->getAllVehicles();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(StoreVehicleRequest $request)
    {
        $validated = $request->validated();
        $this->vehicleService->createVehicle($validated);
        return redirect()->route('vehicles.index')->with('success', 'Vehículo creado exitosamente');
    }

    public function show(string $id)
    {
        $vehicle = $this->vehicleService->getVehicleById($id);
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(string $id)
    {
        $vehicle = $this->vehicleService->getVehicleById($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(UpdateVehicleRequest $request, string $id)
    {
        $validated = $request->validated();
        $this->vehicleService->updateVehicle($id, $validated);
        return redirect()->route('vehicles.show', $id)->with('success', 'Vehículo actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $this->vehicleService->deleteVehicle($id);
        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado exitosamente');
    }
}