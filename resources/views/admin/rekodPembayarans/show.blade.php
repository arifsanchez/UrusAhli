@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rekodPembayaran.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.ahli') }}
                        </th>
                        <td>
                            {{ $rekodPembayaran->ahli->nama_penuh ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.tujuan_pembayaran') }}
                        </th>
                        <td>
                            {{ App\RekodPembayaran::TUJUAN_PEMBAYARAN_SELECT[$rekodPembayaran->tujuan_pembayaran] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.jenis_pembayaran') }}
                        </th>
                        <td>
                            {{ App\RekodPembayaran::JENIS_PEMBAYARAN_SELECT[$rekodPembayaran->jenis_pembayaran] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.jumlah_pembayaran') }}
                        </th>
                        <td>
                            ${{ $rekodPembayaran->jumlah_pembayaran }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.bukti_pembayaran') }}
                        </th>
                        <td>
                            {{ $rekodPembayaran->bukti_pembayaran }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.diterima_oleh') }}
                        </th>
                        <td>
                            {{ $rekodPembayaran->diterima_oleh->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.tarikh_transaksi') }}
                        </th>
                        <td>
                            {{ $rekodPembayaran->tarikh_transaksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekodPembayaran.fields.status_transaksi') }}
                        </th>
                        <td>
                            {{ App\RekodPembayaran::STATUS_TRANSAKSI_SELECT[$rekodPembayaran->status_transaksi] }}
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