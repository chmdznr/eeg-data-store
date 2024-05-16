<?php

namespace App\Http\Requests;

use App\Models\PregnantEeg;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePregnantEegRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pregnant_eeg_create');
    }

    public function rules()
    {
        return [
            'trial_code' => [
                'string',
                'required',
            ],
            'channel' => [
                'string',
                'nullable',
            ],
            'value' => [
                'numeric',
            ],
        ];
    }
}
