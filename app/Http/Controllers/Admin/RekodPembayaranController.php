<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRekodPembayaranRequest;
use App\Http\Requests\StoreRekodPembayaranRequest;
use App\Http\Requests\UpdateRekodPembayaranRequest;
use App\RekodPembayaran;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RekodPembayaranController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('rekod_pembayaran_access'), 403);

        $rekodPembayarans = RekodPembayaran::all();

        return view('admin.rekodPembayarans.index', compact('rekodPembayarans'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('rekod_pembayaran_create'), 403);

        $ahlis = UserProfile::all()->pluck('nama_penuh', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diterima_olehs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rekodPembayarans.create', compact('ahlis', 'diterima_olehs'));
    }

    public function store(StoreRekodPembayaranRequest $request)
    {
        abort_unless(\Gate::allows('rekod_pembayaran_create'), 403);

        $rekodPembayaran = RekodPembayaran::create($request->all());

        foreach ($request->input('bukti_pembayaran', []) as $file) {
            $rekodPembayaran->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('bukti_pembayaran');
        }

        return redirect()->route('admin.rekod-pembayarans.index');
    }

    public function edit(RekodPembayaran $rekodPembayaran)
    {
        abort_unless(\Gate::allows('rekod_pembayaran_edit'), 403);

        $ahlis = UserProfile::all()->pluck('nama_penuh', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diterima_olehs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rekodPembayaran->load('ahli', 'diterima_oleh');

        return view('admin.rekodPembayarans.edit', compact('ahlis', 'diterima_olehs', 'rekodPembayaran'));
    }

    public function update(UpdateRekodPembayaranRequest $request, RekodPembayaran $rekodPembayaran)
    {
        abort_unless(\Gate::allows('rekod_pembayaran_edit'), 403);

        $rekodPembayaran->update($request->all());

        if (count($rekodPembayaran->bukti_pembayaran) > 0) {
            foreach ($rekodPembayaran->bukti_pembayaran as $media) {
                if (!in_array($media->file_name, $request->input('bukti_pembayaran', []))) {
                    $media->delete();
                }
            }
        }

        $media = $rekodPembayaran->bukti_pembayaran->pluck('file_name')->toArray();

        foreach ($request->input('bukti_pembayaran', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $rekodPembayaran->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('bukti_pembayaran');
            }
        }

        return redirect()->route('admin.rekod-pembayarans.index');
    }

    public function show(RekodPembayaran $rekodPembayaran)
    {
        abort_unless(\Gate::allows('rekod_pembayaran_show'), 403);

        $rekodPembayaran->load('ahli', 'diterima_oleh');

        return view('admin.rekodPembayarans.show', compact('rekodPembayaran'));
    }

    public function destroy(RekodPembayaran $rekodPembayaran)
    {
        abort_unless(\Gate::allows('rekod_pembayaran_delete'), 403);

        $rekodPembayaran->delete();

        return back();
    }

    public function massDestroy(MassDestroyRekodPembayaranRequest $request)
    {
        RekodPembayaran::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
