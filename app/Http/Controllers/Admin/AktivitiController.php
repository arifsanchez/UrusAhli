<?php

namespace App\Http\Controllers\Admin;

use App\Aktiviti;
use App\Bahagian;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAktivitiRequest;
use App\Http\Requests\StoreAktivitiRequest;
use App\Http\Requests\UpdateAktivitiRequest;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AktivitiController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('aktiviti_access'), 403);

        $aktivitis = Aktiviti::all();

        return view('admin.aktivitis.index', compact('aktivitis'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('aktiviti_create'), 403);

        $bahagians = Bahagian::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jemputan_olehs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.aktivitis.create', compact('bahagians', 'jemputan_olehs'));
    }

    public function store(StoreAktivitiRequest $request)
    {
        abort_unless(\Gate::allows('aktiviti_create'), 403);

        $aktiviti = Aktiviti::create($request->all());

        return redirect()->route('admin.aktivitis.index');
    }

    public function edit(Aktiviti $aktiviti)
    {
        abort_unless(\Gate::allows('aktiviti_edit'), 403);

        $bahagians = Bahagian::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jemputan_olehs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aktiviti->load('bahagian', 'jemputan_oleh');

        return view('admin.aktivitis.edit', compact('bahagians', 'jemputan_olehs', 'aktiviti'));
    }

    public function update(UpdateAktivitiRequest $request, Aktiviti $aktiviti)
    {
        abort_unless(\Gate::allows('aktiviti_edit'), 403);

        $aktiviti->update($request->all());

        return redirect()->route('admin.aktivitis.index');
    }

    public function show(Aktiviti $aktiviti)
    {
        abort_unless(\Gate::allows('aktiviti_show'), 403);

        $aktiviti->load('bahagian', 'jemputan_oleh');

        return view('admin.aktivitis.show', compact('aktiviti'));
    }

    public function destroy(Aktiviti $aktiviti)
    {
        abort_unless(\Gate::allows('aktiviti_delete'), 403);

        $aktiviti->delete();

        return back();
    }

    public function massDestroy(MassDestroyAktivitiRequest $request)
    {
        Aktiviti::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
