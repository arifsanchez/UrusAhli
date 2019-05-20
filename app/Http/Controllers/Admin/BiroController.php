<?php

namespace App\Http\Controllers\Admin;

use App\Bahagian;
use App\Biro;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBiroRequest;
use App\Http\Requests\StoreBiroRequest;
use App\Http\Requests\UpdateBiroRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BiroController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('biro_access'), 403);

        $biros = Biro::all();

        return view('admin.biros.index', compact('biros'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('biro_create'), 403);

        $bahagians = Bahagian::all()->pluck('nama', 'id');

        return view('admin.biros.create', compact('bahagians'));
    }

    public function store(StoreBiroRequest $request)
    {
        abort_unless(\Gate::allows('biro_create'), 403);

        $biro = Biro::create($request->all());
        $biro->bahagians()->sync($request->input('bahagians', []));

        return redirect()->route('admin.biros.index');
    }

    public function edit(Biro $biro)
    {
        abort_unless(\Gate::allows('biro_edit'), 403);

        $bahagians = Bahagian::all()->pluck('nama', 'id');

        $biro->load('bahagians');

        return view('admin.biros.edit', compact('bahagians', 'biro'));
    }

    public function update(UpdateBiroRequest $request, Biro $biro)
    {
        abort_unless(\Gate::allows('biro_edit'), 403);

        $biro->update($request->all());
        $biro->bahagians()->sync($request->input('bahagians', []));

        return redirect()->route('admin.biros.index');
    }

    public function show(Biro $biro)
    {
        abort_unless(\Gate::allows('biro_show'), 403);

        $biro->load('bahagians');

        return view('admin.biros.show', compact('biro'));
    }

    public function destroy(Biro $biro)
    {
        abort_unless(\Gate::allows('biro_delete'), 403);

        $biro->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiroRequest $request)
    {
        Biro::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
