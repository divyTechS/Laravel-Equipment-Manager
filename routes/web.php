<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;

// Redirect the homepage to the equipment index
Route::get('/', function () {
    return redirect()->route('equipment.index');
});

// Register all 7 CRUD routes for the EquipmentController
Route::resource('equipment', EquipmentController::class);


