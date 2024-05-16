<?php

namespace App\Http\Requests;

use App\Models\NewbornEeg;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewbornEegRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newborn_eeg_edit');
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
