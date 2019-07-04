@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userProfile.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.cawangan') }}
                        </th>
                        <td>
                            {{ $userProfile->cawangan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.nama_penuh') }}
                        </th>
                        <td>
                            {{ $userProfile->nama_penuh }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.user_photo') }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.no_kp') }}
                        </th>
                        <td>
                            {{ $userProfile->no_kp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.jantina') }}
                        </th>
                        <td>
                            {{ App\UserProfile::JANTINA_RADIO[$userProfile->jantina] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.bangsa') }}
                        </th>
                        <td>
                            {{ App\UserProfile::BANGSA_SELECT[$userProfile->bangsa] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.status_perkahwinan') }}
                        </th>
                        <td>
                            {{ App\UserProfile::STATUS_PERKAHWINAN_RADIO[$userProfile->status_perkahwinan] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.pekerjaan') }}
                        </th>
                        <td>
                            {{ $userProfile->pekerjaan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.alamat') }}
                        </th>
                        <td>
                            {!! $userProfile->alamat !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $userProfile->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.jenis_keahlian') }}
                        </th>
                        <td>
                            {{ App\UserProfile::JENIS_KEAHLIAN_SELECT[$userProfile->jenis_keahlian] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.status_keahlian') }}
                        </th>
                        <td>
                            {{ App\UserProfile::STATUS_KEAHLIAN_SELECT[$userProfile->status_keahlian] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.no_ahli_cwg') }}
                        </th>
                        <td>
                            {{ $userProfile->no_ahli_cwg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.no_ahli_bhg') }}
                        </th>
                        <td>
                            {{ $userProfile->no_ahli_bhg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfile.fields.tarikh_kelulusan') }}
                        </th>
                        <td>
                            {{ $userProfile->tarikh_kelulusan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection