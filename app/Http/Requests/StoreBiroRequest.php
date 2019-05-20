<?php

namespace App\Http\Requests;

use App\Biro;
use Illuminate\Foundation\Http\FormRequest;

class StoreBiroRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('biro_create');
    }

    public function rules()
    {
        return [
            'bahagians.*' => [
                'integer',
            ],
            'bahagians'   => [
                'array',
            ],
        ];
    }
}
