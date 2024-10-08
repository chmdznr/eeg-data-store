@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pregnantEeg.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pregnant-eegs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantEeg.fields.id') }}
                        </th>
                        <td>
                            {{ $pregnantEeg->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantEeg.fields.created_at') }}
                        </th>
                        <td>
                            {{ $pregnantEeg->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantEeg.fields.trial_code') }}
                        </th>
                        <td>
                            {{ $pregnantEeg->trial_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantEeg.fields.channel') }}
                        </th>
                        <td>
                            {{ $pregnantEeg->channel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pregnantEeg.fields.value') }}
                        </th>
                        <td>
                            {{ $pregnantEeg->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pregnant-eegs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
