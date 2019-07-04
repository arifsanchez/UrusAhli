<?php

namespace App\Http\Requests;

use App\UserProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyUserProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_profile_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:user_profiles,id',
        ];
    }
}
