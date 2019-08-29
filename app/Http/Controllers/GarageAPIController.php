<?php

namespace App\Http\Controllers;

use App\Garage;
use App\Http\Resources\GarageCollection;
use App\Http\Resources\GarageResource;
 
class GarageAPIController extends Controller
{
    public function index()
    {
        return new GarageCollection(Garage::paginate());
    }
 
    public function show(Garage $garage)
    {
        return new GarageResource($garage->load(['cars']));
    }

    public function store(Request $request)
    {
        return new GarageResource(Garage::create($request->all()));
    }

    public function update(Request $request, Garage $garage)
    {
        $garage->update($request->all());

        return new GarageResource($garage);
    }

    public function destroy(Request $request, Garage $garage)
    {
        $garage->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}