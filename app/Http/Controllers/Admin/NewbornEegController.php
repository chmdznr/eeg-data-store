<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewbornEegRequest;
use App\Http\Requests\StoreNewbornEegRequest;
use App\Http\Requests\UpdateNewbornEegRequest;
use App\Models\NewbornEeg;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NewbornEegController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('newborn_eeg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NewbornEeg::query()->select(sprintf('%s.*', (new NewbornEeg)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'newborn_eeg_show';
                $editGate      = 'newborn_eeg_edit';
                $deleteGate    = 'newborn_eeg_delete';
                $crudRoutePart = 'newborn-eegs';

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

        return view('admin.newbornEegs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('newborn_eeg_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newbornEegs.create');
    }

    public function store(StoreNewbornEegRequest $request)
    {
        $newbornEeg = NewbornEeg::create($request->all());

        return redirect()->route('admin.newborn-eegs.index');
    }

    public function edit(NewbornEeg $newbornEeg)
    {
        abort_if(Gate::denies('newborn_eeg_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newbornEegs.edit', compact('newbornEeg'));
    }

    public function update(UpdateNewbornEegRequest $request, NewbornEeg $newbornEeg)
    {
        $newbornEeg->update($request->all());

        return redirect()->route('admin.newborn-eegs.index');
    }

    public function show(NewbornEeg $newbornEeg)
    {
        abort_if(Gate::denies('newborn_eeg_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newbornEegs.show', compact('newbornEeg'));
    }

    public function destroy(NewbornEeg $newbornEeg)
    {
        abort_if(Gate::denies('newborn_eeg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newbornEeg->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewbornEegRequest $request)
    {
        $newbornEegs = NewbornEeg::find(request('ids'));

        foreach ($newbornEegs as $newbornEeg) {
            $newbornEeg->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
