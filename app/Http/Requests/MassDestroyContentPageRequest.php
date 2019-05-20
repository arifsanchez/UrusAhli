<?php

namespace App\Http\Requests;

use App\ContentPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyContentPageRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('content_page_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:content_pages,id',
        ];
    }
}
