<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Resources\V1\MunicipalityResource;
use App\Http\Resources\V1\ProvinceResource;

class MunicipalityController extends Controller
{
    // Returns municipalities of a province
    public function index(Province $province)
    {
        $municipalities = $province->municipalities;

        if ($municipalities->isEmpty()) {
            return response()->json(['message' => 'No Municipalities Found'], 404);
        }

        return MunicipalityResource::collection($municipalities);
    }

    // Returns a province
    public function show(Province $province)
    {
        return new ProvinceResource($province);
    }
}
