<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewbornEegRequest;
use App\Http\Requests\UpdateNewbornEegRequest;
use App\Http\Resources\Admin\NewbornEegResource;
use App\Models\NewbornEeg;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewbornEegApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('newborn_eeg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewbornEegResource(NewbornEeg::all());
    }

    public function store(StoreNewbornEegRequest $request)
    {
        $newbornEeg = NewbornEeg::create($request->all());

        return (new NewbornEegResource($newbornEeg))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NewbornEeg $newbornEeg)
    {
        abort_if(Gate::denies('newborn_eeg_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewbornEegResource($newbornEeg);
    }

    public function update(UpdateNewbornEegRequest $request, NewbornEeg $newbornEeg)
    {
        $newbornEeg->update($request->all());

        return (new NewbornEegResource($newbornEeg))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NewbornEeg $newbornEeg)
    {
        abort_if(Gate::denies('newborn_eeg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newbornEeg->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
