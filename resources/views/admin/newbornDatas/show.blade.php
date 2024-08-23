@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newbornData.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newborn-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.id') }}
                        </th>
                        <td>
                            {{ $newbornData->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.created_at') }}
                        </th>
                        <td>
                            {{ $newbornData->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.trial_code') }}
                        </th>
                        <td>
                            {{ $newbornData->trial_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.name') }}
                        </th>
                        <td>
                            {{ $newbornData->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.mother_name') }}
                        </th>
                        <td>
                            {{ $newbornData->mother_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.mother_age') }}
                        </th>
                        <td>
                            {{ $newbornData->mother_age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.gravidity') }}
                        </th>
                        <td>
                            {{ $newbornData->gravidity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.parity') }}
                        </th>
                        <td>
                            {{ $newbornData->parity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.accel_x') }}
                        </th>
                        <td>
                            {{ $newbornData->accel_x }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.accel_y') }}
                        </th>
                        <td>
                            {{ $newbornData->accel_y }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.accel_z') }}
                        </th>
                        <td>
                            {{ $newbornData->accel_z }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.thermal') }}
                        </th>
                        <td>
                            {{ $newbornData->thermal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.pulse') }}
                        </th>
                        <td>
                            {{ $newbornData->pulse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornData.fields.spo_2') }}
                        </th>
                        <td>
                            {{ $newbornData->spo_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newborn-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
