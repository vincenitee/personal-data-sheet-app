<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Resources\V1\RegionResource;
use App\Http\Resources\V1\RegionCollection;

class RegionController extends Controller
{
    public function index()
    {
        return RegionResource::collection(Region::all());
    }

    public function show(Region $region)
    {
        return new RegionResource($region);
    }
}
