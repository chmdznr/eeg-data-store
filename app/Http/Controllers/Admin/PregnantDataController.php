<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPregnantDataRequest;
use App\Http\Requests\StorePregnantDataRequest;
use App\Http\Requests\UpdatePregnantDataRequest;
use App\Models\PregnantData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PregnantDataController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pregnant_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PregnantData::query()->select(sprintf('%s.*', (new PregnantData)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pregnant_data_show';
                $editGate      = 'pregnant_data_edit';
                $deleteGate    = 'pregnant_data_delete';
                $crudRoutePart = 'pregnant-datas';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at : '';
            });
            $table->editColumn('trial_code', function ($row) {
                return $row->trial_code ? $row->trial_code : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('gravidity', function ($row) {
                return $row->gravidity ? $row->gravidity : '';
            });
            $table->editColumn('parity', function ($row) {
                return $row->parity ? $row->parity : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->editColumn('hr', function ($row) {
                return $row->hr ? $row->hr : '';
            });
            $table->editColumn('spo_2', function ($row) {
                return $row->spo_2 ? $row->spo_2 : '';
            });
            $table->editColumn('resp_count', function ($row) {
                return $row->resp_count ? $row->resp_count : '';
            });
            $table->editColumn('sistole', function ($row) {
                return $row->sistole ? $row->sistole : '';
            });
            $table->editColumn('diastole', function ($row) {
                return $row->diastole ? $row->diastole : '';
            });
            $table->editColumn('fetal_hr', function ($row) {
                return $row->fetal_hr ? $row->fetal_hr : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.pregnantDatas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pregnant_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pregnantDatas.create');
    }

    public function store(StorePregnantDataRequest $request)
    {
        $pregnantData = PregnantData::create($request->all());

        return redirect()->route('admin.pregnant-datas.index');
    }

    public function edit(PregnantData $pregnantData)
    {
        abort_if(Gate::denies('pregnant_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pregnantDatas.edit', compact('pregnantData'));
    }

    public function update(UpdatePregnantDataRequest $request, PregnantData $pregnantData)
    {
        $pregnantData->update($request->all());

        return redirect()->route('admin.pregnant-datas.index');
    }

    public function show(PregnantData $pregnantData)
    {
        abort_if(Gate::denies('pregnant_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pregnantDatas.show', compact('pregnantData'));
    }

    public function destroy(PregnantData $pregnantData)
    {
        abort_if(Gate::denies('pregnant_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pregnantData->delete();

        return back();
    }

    public function massDestroy(MassDestroyPregnantDataRequest $request)
    {
        $pregnantDatas = PregnantData::find(request('ids'));

        foreach ($pregnantDatas as $pregnantData) {
            $pregnantData->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
