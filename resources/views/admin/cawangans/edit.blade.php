@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cawangan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.cawangans.update", [$cawangan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('bahagian_id') ? 'has-error' : '' }}">
                <label for="bahagian">{{ trans('cruds.cawangan.fields.bahagian') }}</label>
                <select name="bahagian_id" id="bahagian" class="form-control select2">
                    @foreach($bahagians as $id => $bahagian)
                        <option value="{{ $id }}" {{ (isset($cawangan) && $cawangan->bahagian ? $cawangan->bahagian->id : old('bahagian_id')) == $id ? 'selected' : '' }}>{{ $bahagian }}</option>
                    @endforeach
                </select>
                @if($errors->has('bahagian_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bahagian_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">{{ trans('cruds.cawangan.fields.nama') }}*</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($cawangan) ? $cawangan->nama : '') }}" required>
                @if($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.cawangan.fields.nama_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection