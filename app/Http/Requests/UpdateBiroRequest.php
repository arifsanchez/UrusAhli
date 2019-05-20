<?php

namespace App\Http\Requests;

use App\Biro;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBiroRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('biro_edit');
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
