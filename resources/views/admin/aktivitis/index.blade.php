@extends('layouts.admin')
@section('content')
@can('aktiviti_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.aktivitis.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.aktiviti.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.aktiviti.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.aktiviti.fields.bahagian') }}
                        </th>
                        <th>
                            {{ trans('cruds.aktiviti.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.aktiviti.fields.jemputan_oleh') }}
                        </th>
                        <th>
                            {{ trans('cruds.aktiviti.fields.tarikh_mula') }}
                        </th>
                        <th>
                            {{ trans('cruds.aktiviti.fields.tarikh_akhir') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aktivitis as $key => $aktiviti)
                        <tr data-entry-id="{{ $aktiviti->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $aktiviti->bahagian->nama ?? '' }}
                            </td>
                            <td>
                                {{ $aktiviti->nama ?? '' }}
                            </td>
                            <td>
                                {{ $aktiviti->jemputan_oleh->name ?? '' }}
                            </td>
                            <td>
                                {{ $aktiviti->tarikh_mula ?? '' }}
                            </td>
                            <td>
                                {{ $aktiviti->tarikh_akhir ?? '' }}
                            </td>
                            <td>
                                @can('aktiviti_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.aktivitis.show', $aktiviti->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('aktiviti_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.aktivitis.edit', $aktiviti->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('aktiviti_delete')
                                    <form action="{{ route('admin.aktivitis.destroy', $aktiviti->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.aktivitis.massDestroy') }}",
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
@can('aktiviti_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection