<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::resource('vehicles', VehicleController::class);

Route::get('/', function () {
    return redirect()->route('vehicles.index');
});