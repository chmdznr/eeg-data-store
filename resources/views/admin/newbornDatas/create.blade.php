@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.newbornData.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.newborn-datas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="trial_code">{{ trans('cruds.newbornData.fields.trial_code') }}</label>
                <input class="form-control {{ $errors->has('trial_code') ? 'is-invalid' : '' }}" type="text" name="trial_code" id="trial_code" value="{{ old('trial_code', '') }}" required>
                @if($errors->has('trial_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trial_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.trial_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.newbornData.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mother_name">{{ trans('cruds.newbornData.fields.mother_name') }}</label>
                <input class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', '') }}" required>
                @if($errors->has('mother_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.mother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mother_age">{{ trans('cruds.newbornData.fields.mother_age') }}</label>
                <input class="form-control {{ $errors->has('mother_age') ? 'is-invalid' : '' }}" type="number" name="mother_age" id="mother_age" value="{{ old('mother_age', '') }}" step="1" required>
                @if($errors->has('mother_age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother_age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.mother_age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gravidity">{{ trans('cruds.newbornData.fields.gravidity') }}</label>
                <input class="form-control {{ $errors->has('gravidity') ? 'is-invalid' : '' }}" type="number" name="gravidity" id="gravidity" value="{{ old('gravidity', '') }}" step="1">
                @if($errors->has('gravidity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gravidity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.gravidity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parity">{{ trans('cruds.newbornData.fields.parity') }}</label>
                <input class="form-control {{ $errors->has('parity') ? 'is-invalid' : '' }}" type="number" name="parity" id="parity" value="{{ old('parity', '') }}" step="1">
                @if($errors->has('parity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.parity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="accel_x">{{ trans('cruds.newbornData.fields.accel_x') }}</label>
                <input class="form-control {{ $errors->has('accel_x') ? 'is-invalid' : '' }}" type="number" name="accel_x" id="accel_x" value="{{ old('accel_x', '') }}" step="0.01">
                @if($errors->has('accel_x'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accel_x') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.accel_x_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="accel_y">{{ trans('cruds.newbornData.fields.accel_y') }}</label>
                <input class="form-control {{ $errors->has('accel_y') ? 'is-invalid' : '' }}" type="number" name="accel_y" id="accel_y" value="{{ old('accel_y', '') }}" step="0.01">
                @if($errors->has('accel_y'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accel_y') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.accel_y_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="accel_z">{{ trans('cruds.newbornData.fields.accel_z') }}</label>
                <input class="form-control {{ $errors->has('accel_z') ? 'is-invalid' : '' }}" type="number" name="accel_z" id="accel_z" value="{{ old('accel_z', '') }}" step="0.01">
                @if($errors->has('accel_z'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accel_z') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.accel_z_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thermal">{{ trans('cruds.newbornData.fields.thermal') }}</label>
                <input class="form-control {{ $errors->has('thermal') ? 'is-invalid' : '' }}" type="number" name="thermal" id="thermal" value="{{ old('thermal', '') }}" step="0.01">
                @if($errors->has('thermal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thermal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.thermal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spo_2">{{ trans('cruds.newbornData.fields.spo_2') }}</label>
                <input class="form-control {{ $errors->has('spo_2') ? 'is-invalid' : '' }}" type="number" name="spo_2" id="spo_2" value="{{ old('spo_2', '') }}" step="1">
                @if($errors->has('spo_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newbornData.fields.spo_2_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection