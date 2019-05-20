<?php

namespace App\Http\Requests;

use App\ContentCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyContentCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('content_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:content_categories,id',
        ];
    }
}
