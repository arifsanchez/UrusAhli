<?php

namespace App\Http\Requests;

use App\Bahagian;
use Illuminate\Foundation\Http\FormRequest;

class StoreBahagianRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('bahagian_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'required',
            ],
        ];
    }
}
