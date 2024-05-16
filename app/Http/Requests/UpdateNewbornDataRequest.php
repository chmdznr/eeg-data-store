<?php

namespace App\Http\Requests;

use App\Models\NewbornData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewbornDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newborn_data_edit');
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
                'nullable',
            ],
            'mother_name' => [
                'string',
                'required',
            ],
            'mother_age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gravidity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'parity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'accel_x' => [
                'numeric',
            ],
            'accel_y' => [
                'numeric',
            ],
            'accel_z' => [
                'numeric',
            ],
            'thermal' => [
                'numeric',
            ],
            'spo_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
