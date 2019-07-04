@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userProfile.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.user-profiles.update", [$userProfile->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('cawangan_id') ? 'has-error' : '' }}">
                <label for="cawangan">{{ trans('cruds.userProfile.fields.cawangan') }}*</label>
                <select name="cawangan_id" id="cawangan" class="form-control select2" required>
                    @foreach($cawangans as $id => $cawangan)
                        <option value="{{ $id }}" {{ (isset($userProfile) && $userProfile->cawangan ? $userProfile->cawangan->id : old('cawangan_id')) == $id ? 'selected' : '' }}>{{ $cawangan }}</option>
                    @endforeach
                </select>
                @if($errors->has('cawangan_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('cawangan_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('nama_penuh') ? 'has-error' : '' }}">
                <label for="nama_penuh">{{ trans('cruds.userProfile.fields.nama_penuh') }}*</label>
                <input type="text" id="nama_penuh" name="nama_penuh" class="form-control" value="{{ old('nama_penuh', isset($userProfile) ? $userProfile->nama_penuh : '') }}" required>
                @if($errors->has('nama_penuh'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama_penuh') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.nama_penuh_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('user_photo') ? 'has-error' : '' }}">
                <label for="user_photo">{{ trans('cruds.userProfile.fields.user_photo') }}</label>
                <div class="needsclick dropzone" id="user_photo-dropzone">

                </div>
                @if($errors->has('user_photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('user_photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.user_photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('no_kp') ? 'has-error' : '' }}">
                <label for="no_kp">{{ trans('cruds.userProfile.fields.no_kp') }}</label>
                <input type="text" id="no_kp" name="no_kp" class="form-control" value="{{ old('no_kp', isset($userProfile) ? $userProfile->no_kp : '') }}">
                @if($errors->has('no_kp'))
                    <em class="invalid-feedback">
                        {{ $errors->first('no_kp') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.no_kp_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('jantina') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.userProfile.fields.jantina') }}</label>
                @foreach(App\UserProfile::JANTINA_RADIO as $key => $label)
                    <div>
                        <input id="jantina_{{ $key }}" name="jantina" type="radio" value="{{ $key }}" {{ old('jantina', $userProfile->jantina) === (string)$key ? 'checked' : '' }}>
                        <label for="jantina_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('jantina'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jantina') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('bangsa') ? 'has-error' : '' }}">
                <label for="bangsa">{{ trans('cruds.userProfile.fields.bangsa') }}</label>
                <select id="bangsa" name="bangsa" class="form-control">
                    <option value="" disabled {{ old('bangsa', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\UserProfile::BANGSA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('bangsa', $userProfile->bangsa) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('bangsa'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bangsa') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('status_perkahwinan') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.userProfile.fields.status_perkahwinan') }}</label>
                @foreach(App\UserProfile::STATUS_PERKAHWINAN_RADIO as $key => $label)
                    <div>
                        <input id="status_perkahwinan_{{ $key }}" name="status_perkahwinan" type="radio" value="{{ $key }}" {{ old('status_perkahwinan', $userProfile->status_perkahwinan) === (string)$key ? 'checked' : '' }}>
                        <label for="status_perkahwinan_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status_perkahwinan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status_perkahwinan') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('pekerjaan') ? 'has-error' : '' }}">
                <label for="pekerjaan">{{ trans('cruds.userProfile.fields.pekerjaan') }}</label>
                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', isset($userProfile) ? $userProfile->pekerjaan : '') }}">
                @if($errors->has('pekerjaan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('pekerjaan') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.pekerjaan_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                <label for="alamat">{{ trans('cruds.userProfile.fields.alamat') }}</label>
                <textarea id="alamat" name="alamat" class="form-control ">{{ old('alamat', isset($userProfile) ? $userProfile->alamat : '') }}</textarea>
                @if($errors->has('alamat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.alamat_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                <label for="phone_number">{{ trans('cruds.userProfile.fields.phone_number') }}</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', isset($userProfile) ? $userProfile->phone_number : '') }}">
                @if($errors->has('phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.phone_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('jenis_keahlian') ? 'has-error' : '' }}">
                <label for="jenis_keahlian">{{ trans('cruds.userProfile.fields.jenis_keahlian') }}</label>
                <select id="jenis_keahlian" name="jenis_keahlian" class="form-control">
                    <option value="" disabled {{ old('jenis_keahlian', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\UserProfile::JENIS_KEAHLIAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_keahlian', $userProfile->jenis_keahlian) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_keahlian'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jenis_keahlian') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('status_keahlian') ? 'has-error' : '' }}">
                <label for="status_keahlian">{{ trans('cruds.userProfile.fields.status_keahlian') }}</label>
                <select id="status_keahlian" name="status_keahlian" class="form-control">
                    <option value="" disabled {{ old('status_keahlian', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\UserProfile::STATUS_KEAHLIAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_keahlian', $userProfile->status_keahlian) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_keahlian'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status_keahlian') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('no_ahli_cwg') ? 'has-error' : '' }}">
                <label for="no_ahli_cwg">{{ trans('cruds.userProfile.fields.no_ahli_cwg') }}</label>
                <input type="text" id="no_ahli_cwg" name="no_ahli_cwg" class="form-control" value="{{ old('no_ahli_cwg', isset($userProfile) ? $userProfile->no_ahli_cwg : '') }}">
                @if($errors->has('no_ahli_cwg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('no_ahli_cwg') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.no_ahli_cwg_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('no_ahli_bhg') ? 'has-error' : '' }}">
                <label for="no_ahli_bhg">{{ trans('cruds.userProfile.fields.no_ahli_bhg') }}</label>
                <input type="text" id="no_ahli_bhg" name="no_ahli_bhg" class="form-control" value="{{ old('no_ahli_bhg', isset($userProfile) ? $userProfile->no_ahli_bhg : '') }}">
                @if($errors->has('no_ahli_bhg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('no_ahli_bhg') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.no_ahli_bhg_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tarikh_kelulusan') ? 'has-error' : '' }}">
                <label for="tarikh_kelulusan">{{ trans('cruds.userProfile.fields.tarikh_kelulusan') }}</label>
                <input type="text" id="tarikh_kelulusan" name="tarikh_kelulusan" class="form-control date" value="{{ old('tarikh_kelulusan', isset($userProfile) ? $userProfile->tarikh_kelulusan : '') }}">
                @if($errors->has('tarikh_kelulusan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarikh_kelulusan') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.userProfile.fields.tarikh_kelulusan_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.userPhotoDropzone = {
    url: '{{ route('admin.user-profiles.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="user_photo"]').remove()
      $('form').append('<input type="hidden" name="user_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="user_photo"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($userProfile) && $userProfile->user_photo)
      var file = {!! json_encode($userProfile->user_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="user_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop