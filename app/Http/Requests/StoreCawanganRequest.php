<?php

namespace App\Http\Requests;

use App\Cawangan;
use Illuminate\Foundation\Http\FormRequest;

class StoreCawanganRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('cawangan_create');
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
