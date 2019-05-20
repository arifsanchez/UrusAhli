<?php

namespace App\Http\Requests;

use App\RekodPembayaran;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRekodPembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('rekod_pembayaran_edit');
    }

    public function rules()
    {
        return [
            'tarikh_transaksi' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
