@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.aktiviti.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('global.aktiviti.fields.bahagian') }}
                        </th>
                        <td>
                            {{ $aktiviti->bahagian->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.aktiviti.fields.nama') }}
                        </th>
                        <td>
                            {{ $aktiviti->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.aktiviti.fields.aturcara') }}
                        </th>
                        <td>
                            {!! $aktiviti->aturcara !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.aktiviti.fields.jemputan_oleh') }}
                        </th>
                        <td>
                            {{ $aktiviti->jemputan_oleh->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.aktiviti.fields.tarikh_mula') }}
                        </th>
                        <td>
                            {{ $aktiviti->tarikh_mula }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.aktiviti.fields.tarikh_akhir') }}
                        </th>
                        <td>
                            {{ $aktiviti->tarikh_akhir }}
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