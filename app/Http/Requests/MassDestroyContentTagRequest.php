<?php

namespace App\Http\Requests;

use App\ContentTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyContentTagRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('content_tag_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:content_tags,id',
        ];
    }
}
