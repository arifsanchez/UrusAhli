<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Bahagian;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBahagianRequest;
use App\Http\Requests\UpdateBahagianRequest;

class BahagianApiController extends Controller
{
    public function index()
    {
        $bahagians = Bahagian::all();

        return $bahagians;
    }

    public function store(StoreBahagianRequest $request)
    {
        return Bahagian::create($request->all());
    }

    public function update(UpdateBahagianRequest $request, Bahagian $bahagian)
    {
        return $bahagian->update($request->all());
    }

    public function show(Bahagian $bahagian)
    {
        return $bahagian;
    }

    public function destroy(Bahagian $bahagian)
    {
        return $bahagian->delete();
    }
}
