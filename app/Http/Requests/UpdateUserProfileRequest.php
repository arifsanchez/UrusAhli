<?php

namespace App\Http\Requests;

use App\UserProfile;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('user_profile_edit');
    }

    public function rules()
    {
        return [
            'cawangan_id' => [
                'required',
                'integer',
            ],
            'nama_penuh'  => [
                'required',
            ],
        ];
    }
}
