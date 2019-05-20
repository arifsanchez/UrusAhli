<?php

namespace App\Http\Requests;

use App\Biro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyBiroRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('biro_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:biros,id',
        ];
    }
}
