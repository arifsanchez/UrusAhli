<?php

namespace App\Http\Requests;

use App\Aktiviti;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAktivitiRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('aktiviti_edit');
    }

    public function rules()
    {
        return [
            'tarikh_mula'  => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'tarikh_akhir' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
