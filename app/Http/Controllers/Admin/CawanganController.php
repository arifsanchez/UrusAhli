<?php

namespace App\Http\Controllers\Admin;

use App\Bahagian;
use App\Cawangan;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCawanganRequest;
use App\Http\Requests\StoreCawanganRequest;
use App\Http\Requests\UpdateCawanganRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CawanganController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('cawangan_access'), 403);

        $cawangans = Cawangan::all();

        return view('admin.cawangans.index', compact('cawangans'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('cawangan_create'), 403);

        $bahagians = Bahagian::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cawangans.create', compact('bahagians'));
    }

    public function store(StoreCawanganRequest $request)
    {
        abort_unless(\Gate::allows('cawangan_create'), 403);

        $cawangan = Cawangan::create($request->all());

        return redirect()->route('admin.cawangans.index');
    }

    public function edit(Cawangan $cawangan)
    {
        abort_unless(\Gate::allows('cawangan_edit'), 403);

        $bahagians = Bahagian::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cawangan->load('bahagian');

        return view('admin.cawangans.edit', compact('bahagians', 'cawangan'));
    }

    public function update(UpdateCawanganRequest $request, Cawangan $cawangan)
    {
        abort_unless(\Gate::allows('cawangan_edit'), 403);

        $cawangan->update($request->all());

        return redirect()->route('admin.cawangans.index');
    }

    public function show(Cawangan $cawangan)
    {
        abort_unless(\Gate::allows('cawangan_show'), 403);

        $cawangan->load('bahagian');

        return view('admin.cawangans.show', compact('cawangan'));
    }

    public function destroy(Cawangan $cawangan)
    {
        abort_unless(\Gate::allows('cawangan_delete'), 403);

        $cawangan->delete();

        return back();
    }

    public function massDestroy(MassDestroyCawanganRequest $request)
    {
        Cawangan::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
