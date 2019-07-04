@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.biro.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.biros.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('bahagians') ? 'has-error' : '' }}">
                <label for="bahagian">{{ trans('cruds.biro.fields.bahagian') }}
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="bahagians[]" id="bahagians" class="form-control select2" multiple="multiple">
                    @foreach($bahagians as $id => $bahagian)
                        <option value="{{ $id }}" {{ (in_array($id, old('bahagians', [])) || isset($biro) && $biro->bahagians->contains($id)) ? 'selected' : '' }}>{{ $bahagian }}</option>
                    @endforeach
                </select>
                @if($errors->has('bahagians'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bahagians') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.biro.fields.bahagian_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">{{ trans('cruds.biro.fields.nama') }}</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($biro) ? $biro->nama : '') }}">
                @if($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.biro.fields.nama_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection