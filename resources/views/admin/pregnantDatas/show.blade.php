@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pregnantData.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pregnant-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.id') }}
                        </th>
                        <td>
                            {{ $pregnantData->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.trial_code') }}
                        </th>
                        <td>
                            {{ $pregnantData->trial_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.name') }}
                        </th>
                        <td>
                            {{ $pregnantData->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.gravidity') }}
                        </th>
                        <td>
                            {{ $pregnantData->gravidity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.parity') }}
                        </th>
                        <td>
                            {{ $pregnantData->parity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.age') }}
                        </th>
                        <td>
                            {{ $pregnantData->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.hr') }}
                        </th>
                        <td>
                            {{ $pregnantData->hr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.spo_2') }}
                        </th>
                        <td>
                            {{ $pregnantData->spo_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.resp_count') }}
                        </th>
                        <td>
                            {{ $pregnantData->resp_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.sistole') }}
                        </th>
                        <td>
                            {{ $pregnantData->sistole }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.diastole') }}
                        </th>
                        <td>
                            {{ $pregnantData->diastole }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantData.fields.fetal_hr') }}
                        </th>
                        <td>
                            {{ $pregnantData->fetal_hr }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pregnant-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection