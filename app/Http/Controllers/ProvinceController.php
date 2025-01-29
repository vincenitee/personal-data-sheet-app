<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Province;
use App\Http\Resources\V1\ProvinceResource;

class ProvinceController extends Controller
{
    // Returns provinces of a region
    public function index(Region $region)
    {
        $provinces = $region->provinces;

        if ($provinces->isEmpty()) {
            return response()->json(['message' => 'No Provinces Found', 404]);
        }

        return ProvinceResource::collection($provinces);
    }

    public function show(Province $province)
    {
        return new ProvinceResource($province);
    }
}
