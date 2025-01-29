<?php

use App\Http\Controllers\MunicipalityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProvinceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// List all regions
Route::get('/regions', [RegionController::class, 'index']);

// Show a single region
Route::get('/regions/{region}', [RegionController::class, 'show']);

// List all provinces in a region (use `index` for collections)
Route::get('/regions/{region}/provinces', [ProvinceController::class, 'index']);

// List all municipalities in a province (use `index` for collections)
Route::get('/provinces/{province}/municipalities', [MunicipalityController::class, 'index']);

