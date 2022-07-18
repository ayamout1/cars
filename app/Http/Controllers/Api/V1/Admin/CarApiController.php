<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\Admin\CarResource;
use App\Models\Car;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('car_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarResource(Car::advancedFilter());
    }

    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->validated());

        return (new CarResource($car))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('car_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Car $car)
    {
        abort_if(Gate::denies('car_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarResource($car);
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());

        return (new CarResource($car))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Car $car)
    {
        abort_if(Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CarResource($car),
            'meta' => [],
        ]);
    }

    public function destroy(Car $car)
    {
        abort_if(Gate::denies('car_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
