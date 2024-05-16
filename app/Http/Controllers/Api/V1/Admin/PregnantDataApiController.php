<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePregnantDataRequest;
use App\Http\Requests\UpdatePregnantDataRequest;
use App\Http\Resources\Admin\PregnantDataResource;
use App\Models\PregnantData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PregnantDataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pregnant_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PregnantDataResource(PregnantData::all());
    }

    public function store(StorePregnantDataRequest $request)
    {
        $pregnantData = PregnantData::create($request->all());

        return (new PregnantDataResource($pregnantData))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PregnantData $pregnantData)
    {
        abort_if(Gate::denies('pregnant_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PregnantDataResource($pregnantData);
    }

    public function update(UpdatePregnantDataRequest $request, PregnantData $pregnantData)
    {
        $pregnantData->update($request->all());

        return (new PregnantDataResource($pregnantData))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PregnantData $pregnantData)
    {
        abort_if(Gate::denies('pregnant_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pregnantData->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
