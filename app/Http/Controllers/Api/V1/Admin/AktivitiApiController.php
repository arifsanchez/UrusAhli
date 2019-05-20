<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Aktiviti;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAktivitiRequest;
use App\Http\Requests\UpdateAktivitiRequest;

class AktivitiApiController extends Controller
{
    public function index()
    {
        $aktivitis = Aktiviti::all();

        return $aktivitis;
    }

    public function store(StoreAktivitiRequest $request)
    {
        return Aktiviti::create($request->all());
    }

    public function update(UpdateAktivitiRequest $request, Aktiviti $aktiviti)
    {
        return $aktiviti->update($request->all());
    }

    public function show(Aktiviti $aktiviti)
    {
        return $aktiviti;
    }

    public function destroy(Aktiviti $aktiviti)
    {
        return $aktiviti->delete();
    }
}
