<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePregnantEegRequest;
use App\Http\Requests\UpdatePregnantEegRequest;
use App\Http\Resources\Admin\PregnantEegResource;
use App\Models\PregnantEeg;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PregnantEegApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pregnant_eeg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PregnantEegResource(PregnantEeg::all());
    }

    public function store(StorePregnantEegRequest $request)
    {
        $pregnantEeg = PregnantEeg::create($request->all());

        return (new PregnantEegResource($pregnantEeg))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PregnantEeg $pregnantEeg)
    {
        abort_if(Gate::denies('pregnant_eeg_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PregnantEegResource($pregnantEeg);
    }

    public function update(UpdatePregnantEegRequest $request, PregnantEeg $pregnantEeg)
    {
        $pregnantEeg->update($request->all());

        return (new PregnantEegResource($pregnantEeg))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PregnantEeg $pregnantEeg)
    {
        abort_if(Gate::denies('pregnant_eeg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pregnantEeg->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
