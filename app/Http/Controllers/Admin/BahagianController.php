<?php

namespace App\Http\Controllers\Admin;

use App\Bahagian;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBahagianRequest;
use App\Http\Requests\StoreBahagianRequest;
use App\Http\Requests\UpdateBahagianRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BahagianController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('bahagian_access'), 403);

        $bahagians = Bahagian::all();

        return view('admin.bahagians.index', compact('bahagians'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('bahagian_create'), 403);

        return view('admin.bahagians.create');
    }

    public function store(StoreBahagianRequest $request)
    {
        abort_unless(\Gate::allows('bahagian_create'), 403);

        $bahagian = Bahagian::create($request->all());

        return redirect()->route('admin.bahagians.index');
    }

    public function edit(Bahagian $bahagian)
    {
        abort_unless(\Gate::allows('bahagian_edit'), 403);

        return view('admin.bahagians.edit', compact('bahagian'));
    }

    public function update(UpdateBahagianRequest $request, Bahagian $bahagian)
    {
        abort_unless(\Gate::allows('bahagian_edit'), 403);

        $bahagian->update($request->all());

        return redirect()->route('admin.bahagians.index');
    }

    public function show(Bahagian $bahagian)
    {
        abort_unless(\Gate::allows('bahagian_show'), 403);

        return view('admin.bahagians.show', compact('bahagian'));
    }

    public function destroy(Bahagian $bahagian)
    {
        abort_unless(\Gate::allows('bahagian_delete'), 403);

        $bahagian->delete();

        return back();
    }

    public function massDestroy(MassDestroyBahagianRequest $request)
    {
        Bahagian::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
