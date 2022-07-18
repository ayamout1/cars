<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Http\Resources\Admin\PriceResource;
use App\Models\Car;
use App\Models\Price;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PriceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('price_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PriceResource(Price::with(['car'])->advancedFilter());
    }

    public function store(StorePriceRequest $request)
    {
        $price = Price::create($request->validated());

        return (new PriceResource($price))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('price_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'car' => Car::get(['id', 'model']),
            ],
        ]);
    }

    public function show(Price $price)
    {
        abort_if(Gate::denies('price_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PriceResource($price->load(['car']));
    }

    public function update(UpdatePriceRequest $request, Price $price)
    {
        $price->update($request->validated());

        return (new PriceResource($price))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Price $price)
    {
        abort_if(Gate::denies('price_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PriceResource($price->load(['car'])),
            'meta' => [
                'car' => Car::get(['id', 'model']),
            ],
        ]);
    }

    public function destroy(Price $price)
    {
        abort_if(Gate::denies('price_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
