<?php

namespace App\Http\Requests;

use App\Models\NewbornEeg;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewbornEegRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newborn_eeg_create');
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
