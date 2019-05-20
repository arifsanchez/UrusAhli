@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.biro.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Bahagian
                        </th>
                        <td>
                            @foreach($biro->bahagians as $id => $bahagian)
                                <span class="label label-info label-many">{{ $bahagian->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.biro.fields.nama') }}
                        </th>
                        <td>
                            {{ $biro->nama }}
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