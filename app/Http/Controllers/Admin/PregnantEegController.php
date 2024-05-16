<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPregnantEegRequest;
use App\Http\Requests\StorePregnantEegRequest;
use App\Http\Requests\UpdatePregnantEegRequest;
use App\Models\PregnantEeg;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PregnantEegController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pregnant_eeg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PregnantEeg::query()->select(sprintf('%s.*', (new PregnantEeg)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pregnant_eeg_show';
                $editGate      = 'pregnant_eeg_edit';
                $deleteGate    = 'pregnant_eeg_delete';
                $crudRoutePart = 'pregnant-eegs';

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
            $table->editColumn('trial_code', function ($row) {
                return $row->trial_code ? $row->trial_code : '';
            });
            $table->editColumn('channel', function ($row) {
                return $row->channel ? $row->channel : '';
            });
            $table->editColumn('value', function ($row) {
                return $row->value ? $row->value : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.pregnantEegs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pregnant_eeg_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pregnantEegs.create');
    }

    public function store(StorePregnantEegRequest $request)
    {
        $pregnantEeg = PregnantEeg::create($request->all());

        return redirect()->route('admin.pregnant-eegs.index');
    }

    public function edit(PregnantEeg $pregnantEeg)
    {
        abort_if(Gate::denies('pregnant_eeg_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pregnantEegs.edit', compact('pregnantEeg'));
    }

    public function update(UpdatePregnantEegRequest $request, PregnantEeg $pregnantEeg)
    {
        $pregnantEeg->update($request->all());

        return redirect()->route('admin.pregnant-eegs.index');
    }

    public function show(PregnantEeg $pregnantEeg)
    {
        abort_if(Gate::denies('pregnant_eeg_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pregnantEegs.show', compact('pregnantEeg'));
    }

    public function destroy(PregnantEeg $pregnantEeg)
    {
        abort_if(Gate::denies('pregnant_eeg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pregnantEeg->delete();

        return back();
    }

    public function massDestroy(MassDestroyPregnantEegRequest $request)
    {
        $pregnantEegs = PregnantEeg::find(request('ids'));

        foreach ($pregnantEegs as $pregnantEeg) {
            $pregnantEeg->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
