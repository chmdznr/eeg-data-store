@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newbornEeg.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newborn-eegs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornEeg.fields.id') }}
                        </th>
                        <td>
                            {{ $newbornEeg->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornEeg.fields.trial_code') }}
                        </th>
                        <td>
                            {{ $newbornEeg->trial_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornEeg.fields.channel') }}
                        </th>
                        <td>
                            {{ $newbornEeg->channel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newbornEeg.fields.value') }}
                        </th>
                        <td>
                            {{ $newbornEeg->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newborn-eegs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection