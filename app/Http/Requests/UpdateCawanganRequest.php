<?php

namespace App\Http\Requests;

use App\Cawangan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCawanganRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('cawangan_edit');
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
