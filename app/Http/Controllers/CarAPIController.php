<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
 
class CarAPIController extends Controller
{
    public function index()
    {
        return new CarCollection(Car::paginate());
    }
 
    public function show(Car $car)
    {
        return new CarResource($car->load(['user', 'garages']));
    }

    public function store(Request $request)
    {
        return new CarResource(Car::create($request->all()));
    }

    public function update(Request $request, Car $car)
    {
        $car->update($request->all());

        return new CarResource($car);
    }

    public function destroy(Request $request, Car $car)
    {
        $car->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}