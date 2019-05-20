<?php

namespace App\Http\Requests;

use App\Bahagian;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBahagianRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('bahagian_edit');
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
