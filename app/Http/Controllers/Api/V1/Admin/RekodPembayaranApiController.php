<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRekodPembayaranRequest;
use App\Http\Requests\UpdateRekodPembayaranRequest;
use App\RekodPembayaran;

class RekodPembayaranApiController extends Controller
{
    public function index()
    {
        $rekodPembayarans = RekodPembayaran::all();

        return $rekodPembayarans;
    }

    public function store(StoreRekodPembayaranRequest $request)
    {
        return RekodPembayaran::create($request->all());
    }

    public function update(UpdateRekodPembayaranRequest $request, RekodPembayaran $rekodPembayaran)
    {
        return $rekodPembayaran->update($request->all());
    }

    public function show(RekodPembayaran $rekodPembayaran)
    {
        return $rekodPembayaran;
    }

    public function destroy(RekodPembayaran $rekodPembayaran)
    {
        return $rekodPembayaran->delete();
    }
}
