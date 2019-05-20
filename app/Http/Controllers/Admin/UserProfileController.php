<?php

namespace App\Http\Controllers\Admin;

use App\Cawangan;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserProfileRequest;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\UserProfile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserProfileController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('user_profile_access'), 403);

        $userProfiles = UserProfile::all();

        return view('admin.userProfiles.index', compact('userProfiles'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('user_profile_create'), 403);

        $cawangans = Cawangan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userProfiles.create', compact('cawangans'));
    }

    public function store(StoreUserProfileRequest $request)
    {
        abort_unless(\Gate::allows('user_profile_create'), 403);

        $userProfile = UserProfile::create($request->all());

        if ($request->input('user_photo', false)) {
            $userProfile->addMedia(storage_path('tmp/uploads/' . $request->input('user_photo')))->toMediaCollection('user_photo');
        }

        return redirect()->route('admin.user-profiles.index');
    }

    public function edit(UserProfile $userProfile)
    {
        abort_unless(\Gate::allows('user_profile_edit'), 403);

        $cawangans = Cawangan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userProfile->load('cawangan');

        return view('admin.userProfiles.edit', compact('cawangans', 'userProfile'));
    }

    public function update(UpdateUserProfileRequest $request, UserProfile $userProfile)
    {
        abort_unless(\Gate::allows('user_profile_edit'), 403);

        $userProfile->update($request->all());

        if ($request->input('user_photo', false)) {
            if (!$userProfile->user_photo || $request->input('user_photo') !== $userProfile->user_photo->file_name) {
                $userProfile->addMedia(storage_path('tmp/uploads/' . $request->input('user_photo')))->toMediaCollection('user_photo');
            }
        } elseif ($userProfile->user_photo) {
            $userProfile->user_photo->delete();
        }

        return redirect()->route('admin.user-profiles.index');
    }

    public function show(UserProfile $userProfile)
    {
        abort_unless(\Gate::allows('user_profile_show'), 403);

        $userProfile->load('cawangan');

        return view('admin.userProfiles.show', compact('userProfile'));
    }

    public function destroy(UserProfile $userProfile)
    {
        abort_unless(\Gate::allows('user_profile_delete'), 403);

        $userProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserProfileRequest $request)
    {
        UserProfile::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
