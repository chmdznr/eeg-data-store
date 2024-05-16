@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pregnantData.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pregnant-datas.update", [$pregnantData->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="trial_code">{{ trans('cruds.pregnantData.fields.trial_code') }}</label>
                <input class="form-control {{ $errors->has('trial_code') ? 'is-invalid' : '' }}" type="text" name="trial_code" id="trial_code" value="{{ old('trial_code', $pregnantData->trial_code) }}" required>
                @if($errors->has('trial_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trial_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.trial_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.pregnantData.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $pregnantData->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gravidity">{{ trans('cruds.pregnantData.fields.gravidity') }}</label>
                <input class="form-control {{ $errors->has('gravidity') ? 'is-invalid' : '' }}" type="number" name="gravidity" id="gravidity" value="{{ old('gravidity', $pregnantData->gravidity) }}" step="1" required>
                @if($errors->has('gravidity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gravidity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.gravidity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="parity">{{ trans('cruds.pregnantData.fields.parity') }}</label>
                <input class="form-control {{ $errors->has('parity') ? 'is-invalid' : '' }}" type="number" name="parity" id="parity" value="{{ old('parity', $pregnantData->parity) }}" step="1" required>
                @if($errors->has('parity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.parity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.pregnantData.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', $pregnantData->age) }}" step="1" required>
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hr">{{ trans('cruds.pregnantData.fields.hr') }}</label>
                <input class="form-control {{ $errors->has('hr') ? 'is-invalid' : '' }}" type="number" name="hr" id="hr" value="{{ old('hr', $pregnantData->hr) }}" step="1">
                @if($errors->has('hr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.hr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spo_2">{{ trans('cruds.pregnantData.fields.spo_2') }}</label>
                <input class="form-control {{ $errors->has('spo_2') ? 'is-invalid' : '' }}" type="number" name="spo_2" id="spo_2" value="{{ old('spo_2', $pregnantData->spo_2) }}" step="1">
                @if($errors->has('spo_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.spo_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resp_count">{{ trans('cruds.pregnantData.fields.resp_count') }}</label>
                <input class="form-control {{ $errors->has('resp_count') ? 'is-invalid' : '' }}" type="number" name="resp_count" id="resp_count" value="{{ old('resp_count', $pregnantData->resp_count) }}" step="1">
                @if($errors->has('resp_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('resp_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.resp_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sistole">{{ trans('cruds.pregnantData.fields.sistole') }}</label>
                <input class="form-control {{ $errors->has('sistole') ? 'is-invalid' : '' }}" type="number" name="sistole" id="sistole" value="{{ old('sistole', $pregnantData->sistole) }}" step="1">
                @if($errors->has('sistole'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sistole') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.sistole_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diastole">{{ trans('cruds.pregnantData.fields.diastole') }}</label>
                <input class="form-control {{ $errors->has('diastole') ? 'is-invalid' : '' }}" type="number" name="diastole" id="diastole" value="{{ old('diastole', $pregnantData->diastole) }}" step="1">
                @if($errors->has('diastole'))
                    <div class="invalid-feedback">
                        {{ $errors->first('diastole') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.diastole_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fetal_hr">{{ trans('cruds.pregnantData.fields.fetal_hr') }}</label>
                <input class="form-control {{ $errors->has('fetal_hr') ? 'is-invalid' : '' }}" type="number" name="fetal_hr" id="fetal_hr" value="{{ old('fetal_hr', $pregnantData->fetal_hr) }}" step="1">
                @if($errors->has('fetal_hr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fetal_hr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pregnantData.fields.fetal_hr_helper') }}</span>
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