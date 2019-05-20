@extends('layouts.admin')
@section('content')
@can('rekod_pembayaran_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.rekod-pembayarans.create") }}">
                {{ trans('global.add') }} {{ trans('global.rekodPembayaran.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.rekodPembayaran.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.ahli') }}
                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.tujuan_pembayaran') }}
                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.jenis_pembayaran') }}
                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.jumlah_pembayaran') }}
                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.bukti_pembayaran') }}
                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.diterima_oleh') }}
                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.tarikh_transaksi') }}
                        </th>
                        <th>
                            {{ trans('global.rekodPembayaran.fields.status_transaksi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekodPembayarans as $key => $rekodPembayaran)
                        <tr data-entry-id="{{ $rekodPembayaran->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rekodPembayaran->ahli->nama_penuh ?? '' }}
                            </td>
                            <td>
                                {{ App\RekodPembayaran::TUJUAN_PEMBAYARAN_SELECT[$rekodPembayaran->tujuan_pembayaran] ?? '' }}
                            </td>
                            <td>
                                {{ App\RekodPembayaran::JENIS_PEMBAYARAN_SELECT[$rekodPembayaran->jenis_pembayaran] ?? '' }}
                            </td>
                            <td>
                                {{ $rekodPembayaran->jumlah_pembayaran ?? '' }}
                            </td>
                            <td>
                                @if($rekodPembayaran->bukti_pembayaran)
                                    @foreach($rekodPembayaran->bukti_pembayaran as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $rekodPembayaran->diterima_oleh->name ?? '' }}
                            </td>
                            <td>
                                {{ $rekodPembayaran->tarikh_transaksi ?? '' }}
                            </td>
                            <td>
                                {{ App\RekodPembayaran::STATUS_TRANSAKSI_SELECT[$rekodPembayaran->status_transaksi] ?? '' }}
                            </td>
                            <td>
                                @can('rekod_pembayaran_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rekod-pembayarans.show', $rekodPembayaran->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('rekod_pembayaran_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rekod-pembayarans.edit', $rekodPembayaran->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('rekod_pembayaran_delete')
                                    <form action="{{ route('admin.rekod-pembayarans.destroy', $rekodPembayaran->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rekod-pembayarans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('rekod_pembayaran_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection