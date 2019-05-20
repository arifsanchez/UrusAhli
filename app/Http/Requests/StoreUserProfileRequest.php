<?php

namespace App\Http\Requests;

use App\UserProfile;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserProfileRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('user_profile_create');
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
