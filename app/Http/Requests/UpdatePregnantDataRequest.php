<?php

namespace App\Http\Requests;

use App\Models\PregnantData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePregnantDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pregnant_data_edit');
    }

    public function rules()
    {
        return [
            'trial_code' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'gravidity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'parity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'hr' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'spo_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sistole' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'diastole' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'fetal_hr' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
