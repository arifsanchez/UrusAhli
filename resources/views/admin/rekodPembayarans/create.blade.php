@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rekodPembayaran.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rekod-pembayarans.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('ahli_id') ? 'has-error' : '' }}">
                <label for="ahli">{{ trans('cruds.rekodPembayaran.fields.ahli') }}</label>
                <select name="ahli_id" id="ahli" class="form-control select2">
                    @foreach($ahlis as $id => $ahli)
                        <option value="{{ $id }}" {{ (isset($rekodPembayaran) && $rekodPembayaran->ahli ? $rekodPembayaran->ahli->id : old('ahli_id')) == $id ? 'selected' : '' }}>{{ $ahli }}</option>
                    @endforeach
                </select>
                @if($errors->has('ahli_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ahli_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tujuan_pembayaran') ? 'has-error' : '' }}">
                <label for="tujuan_pembayaran">{{ trans('cruds.rekodPembayaran.fields.tujuan_pembayaran') }}</label>
                <select id="tujuan_pembayaran" name="tujuan_pembayaran" class="form-control">
                    <option value="" disabled {{ old('tujuan_pembayaran', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\RekodPembayaran::TUJUAN_PEMBAYARAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tujuan_pembayaran', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tujuan_pembayaran'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tujuan_pembayaran') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('jenis_pembayaran') ? 'has-error' : '' }}">
                <label for="jenis_pembayaran">{{ trans('cruds.rekodPembayaran.fields.jenis_pembayaran') }}</label>
                <select id="jenis_pembayaran" name="jenis_pembayaran" class="form-control">
                    <option value="" disabled {{ old('jenis_pembayaran', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\RekodPembayaran::JENIS_PEMBAYARAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_pembayaran', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_pembayaran'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jenis_pembayaran') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('jumlah_pembayaran') ? 'has-error' : '' }}">
                <label for="jumlah_pembayaran">{{ trans('cruds.rekodPembayaran.fields.jumlah_pembayaran') }}</label>
                <input type="number" id="jumlah_pembayaran" name="jumlah_pembayaran" class="form-control" value="{{ old('jumlah_pembayaran', isset($rekodPembayaran) ? $rekodPembayaran->jumlah_pembayaran : '') }}" step="0.01">
                @if($errors->has('jumlah_pembayaran'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah_pembayaran') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rekodPembayaran.fields.jumlah_pembayaran_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bukti_pembayaran') ? 'has-error' : '' }}">
                <label for="bukti_pembayaran">{{ trans('cruds.rekodPembayaran.fields.bukti_pembayaran') }}</label>
                <div class="needsclick dropzone" id="bukti_pembayaran-dropzone">

                </div>
                @if($errors->has('bukti_pembayaran'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bukti_pembayaran') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rekodPembayaran.fields.bukti_pembayaran_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('diterima_oleh_id') ? 'has-error' : '' }}">
                <label for="diterima_oleh">{{ trans('cruds.rekodPembayaran.fields.diterima_oleh') }}</label>
                <select name="diterima_oleh_id" id="diterima_oleh" class="form-control select2">
                    @foreach($diterima_olehs as $id => $diterima_oleh)
                        <option value="{{ $id }}" {{ (isset($rekodPembayaran) && $rekodPembayaran->diterima_oleh ? $rekodPembayaran->diterima_oleh->id : old('diterima_oleh_id')) == $id ? 'selected' : '' }}>{{ $diterima_oleh }}</option>
                    @endforeach
                </select>
                @if($errors->has('diterima_oleh_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('diterima_oleh_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tarikh_transaksi') ? 'has-error' : '' }}">
                <label for="tarikh_transaksi">{{ trans('cruds.rekodPembayaran.fields.tarikh_transaksi') }}</label>
                <input type="text" id="tarikh_transaksi" name="tarikh_transaksi" class="form-control datetime" value="{{ old('tarikh_transaksi', isset($rekodPembayaran) ? $rekodPembayaran->tarikh_transaksi : '') }}">
                @if($errors->has('tarikh_transaksi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarikh_transaksi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rekodPembayaran.fields.tarikh_transaksi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status_transaksi') ? 'has-error' : '' }}">
                <label for="status_transaksi">{{ trans('cruds.rekodPembayaran.fields.status_transaksi') }}</label>
                <select id="status_transaksi" name="status_transaksi" class="form-control">
                    <option value="" disabled {{ old('status_transaksi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\RekodPembayaran::STATUS_TRANSAKSI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_transaksi', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_transaksi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status_transaksi') }}
                    </em>
                @endif
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
    var uploadedBuktiPembayaranMap = {}
Dropzone.options.buktiPembayaranDropzone = {
    url: '{{ route('admin.rekod-pembayarans.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="bukti_pembayaran[]" value="' + response.name + '">')
      uploadedBuktiPembayaranMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBuktiPembayaranMap[file.name]
      }
      $('form').find('input[name="bukti_pembayaran[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($rekodPembayaran) && $rekodPembayaran->bukti_pembayaran)
          var files =
            {!! json_encode($rekodPembayaran->bukti_pembayaran) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="bukti_pembayaran[]" value="' + file.file_name + '">')
            }
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