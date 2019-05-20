@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.aktiviti.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.aktivitis.update", [$aktiviti->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('bahagian_id') ? 'has-error' : '' }}">
                <label for="bahagian">{{ trans('global.aktiviti.fields.bahagian') }}</label>
                <select name="bahagian_id" id="bahagian" class="form-control select2">
                    @foreach($bahagians as $id => $bahagian)
                        <option value="{{ $id }}" {{ (isset($aktiviti) && $aktiviti->bahagian ? $aktiviti->bahagian->id : old('bahagian_id')) == $id ? 'selected' : '' }}>{{ $bahagian }}</option>
                    @endforeach
                </select>
                @if($errors->has('bahagian_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bahagian_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">{{ trans('global.aktiviti.fields.nama') }}</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($aktiviti) ? $aktiviti->nama : '') }}">
                @if($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.aktiviti.fields.nama_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('aturcara') ? 'has-error' : '' }}">
                <label for="aturcara">{{ trans('global.aktiviti.fields.aturcara') }}</label>
                <textarea id="aturcara" name="aturcara" class="form-control ckeditor">{{ old('aturcara', isset($aktiviti) ? $aktiviti->aturcara : '') }}</textarea>
                @if($errors->has('aturcara'))
                    <em class="invalid-feedback">
                        {{ $errors->first('aturcara') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.aktiviti.fields.aturcara_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('jemputan_oleh_id') ? 'has-error' : '' }}">
                <label for="jemputan_oleh">{{ trans('global.aktiviti.fields.jemputan_oleh') }}</label>
                <select name="jemputan_oleh_id" id="jemputan_oleh" class="form-control select2">
                    @foreach($jemputan_olehs as $id => $jemputan_oleh)
                        <option value="{{ $id }}" {{ (isset($aktiviti) && $aktiviti->jemputan_oleh ? $aktiviti->jemputan_oleh->id : old('jemputan_oleh_id')) == $id ? 'selected' : '' }}>{{ $jemputan_oleh }}</option>
                    @endforeach
                </select>
                @if($errors->has('jemputan_oleh_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jemputan_oleh_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tarikh_mula') ? 'has-error' : '' }}">
                <label for="tarikh_mula">{{ trans('global.aktiviti.fields.tarikh_mula') }}</label>
                <input type="text" id="tarikh_mula" name="tarikh_mula" class="form-control datetime" value="{{ old('tarikh_mula', isset($aktiviti) ? $aktiviti->tarikh_mula : '') }}">
                @if($errors->has('tarikh_mula'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarikh_mula') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.aktiviti.fields.tarikh_mula_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tarikh_akhir') ? 'has-error' : '' }}">
                <label for="tarikh_akhir">{{ trans('global.aktiviti.fields.tarikh_akhir') }}</label>
                <input type="text" id="tarikh_akhir" name="tarikh_akhir" class="form-control datetime" value="{{ old('tarikh_akhir', isset($aktiviti) ? $aktiviti->tarikh_akhir : '') }}">
                @if($errors->has('tarikh_akhir'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarikh_akhir') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.aktiviti.fields.tarikh_akhir_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection