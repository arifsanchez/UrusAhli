<?php

namespace App\Http\Requests;

use App\Bahagian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyBahagianRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('bahagian_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bahagians,id',
        ];
    }
}
