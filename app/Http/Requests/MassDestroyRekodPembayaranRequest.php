<?php

namespace App\Http\Requests;

use App\RekodPembayaran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRekodPembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('rekod_pembayaran_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rekod_pembayarans,id',
        ];
    }
}
