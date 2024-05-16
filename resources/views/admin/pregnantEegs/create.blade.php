@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pregnantEeg.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pregnant-eegs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="trial_code">{{ trans('cruds.pregnantEeg.fields.trial_code') }}</label>
                <input class="form-control {{ $errors->has('trial_code') ? 'is-invalid' : '' }}" type="text" name="trial_code" id="trial_code" value="{{ old('trial_code', '') }}" required>
                @if($errors->has('trial_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trial_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantEeg.fields.trial_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="channel">{{ trans('cruds.pregnantEeg.fields.channel') }}</label>
                <input class="form-control {{ $errors->has('channel') ? 'is-invalid' : '' }}" type="text" name="channel" id="channel" value="{{ old('channel', '') }}">
                @if($errors->has('channel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('channel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantEeg.fields.channel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value">{{ trans('cruds.pregnantEeg.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', '') }}" step="0.01">
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantEeg.fields.value_helper') }}</span>
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