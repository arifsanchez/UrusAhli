<?php

namespace App\Http\Requests;

use App\Cawangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyCawanganRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('cawangan_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cawangans,id',
        ];
    }
}
