<?php

namespace App\Http\Requests;

use App\Models\Price;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePriceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_edit');
    }

    public function rules()
    {
        return [
            'mmr' => [
                'string',
                'nullable',
            ],
            'caroffer' => [
                'string',
                'nullable',
            ],
            'blackbook' => [
                'string',
                'nullable',
            ],
            'retail' => [
                'string',
                'nullable',
            ],
            'car_id' => [
                'integer',
                'exists:cars,id',
                'nullable',
            ],
        ];
    }
}
