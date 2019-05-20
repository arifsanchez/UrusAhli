<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\UserProfile;

class UserProfileApiController extends Controller
{
    public function index()
    {
        $userProfiles = UserProfile::all();

        return $userProfiles;
    }

    public function store(StoreUserProfileRequest $request)
    {
        return UserProfile::create($request->all());
    }

    public function update(UpdateUserProfileRequest $request, UserProfile $userProfile)
    {
        return $userProfile->update($request->all());
    }

    public function show(UserProfile $userProfile)
    {
        return $userProfile;
    }

    public function destroy(UserProfile $userProfile)
    {
        return $userProfile->delete();
    }
}
