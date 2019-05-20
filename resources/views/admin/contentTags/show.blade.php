@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.contentTag.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('global.contentTag.fields.name') }}
                        </th>
                        <td>
                            {{ $contentTag->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.contentTag.fields.slug') }}
                        </th>
                        <td>
                            {{ $contentTag->slug }}
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