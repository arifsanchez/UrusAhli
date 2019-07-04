@extends('layouts.admin')
@section('content')
@can('aktiviti_perkim_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.aktiviti-perkims.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.aktivitiPerkim.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.aktivitiPerkim.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aktivitiPerkims as $key => $aktivitiPerkim)
                        <tr data-entry-id="{{ $aktivitiPerkim->id }}">
                            <td>

                            </td>
                            <td>
                                @can('aktiviti_perkim_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.aktiviti-perkims.show', $aktivitiPerkim->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('aktiviti_perkim_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.aktiviti-perkims.edit', $aktivitiPerkim->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('aktiviti_perkim_delete')
                                    <form action="{{ route('admin.aktiviti-perkims.destroy', $aktivitiPerkim->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.aktiviti-perkims.massDestroy') }}",
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
@can('aktiviti_perkim_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection