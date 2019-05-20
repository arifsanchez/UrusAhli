<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Cawangan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCawanganRequest;
use App\Http\Requests\UpdateCawanganRequest;

class CawanganApiController extends Controller
{
    public function index()
    {
        $cawangans = Cawangan::all();

        return $cawangans;
    }

    public function store(StoreCawanganRequest $request)
    {
        return Cawangan::create($request->all());
    }

    public function update(UpdateCawanganRequest $request, Cawangan $cawangan)
    {
        return $cawangan->update($request->all());
    }

    public function show(Cawangan $cawangan)
    {
        return $cawangan;
    }

    public function destroy(Cawangan $cawangan)
    {
        return $cawangan->delete();
    }
}
