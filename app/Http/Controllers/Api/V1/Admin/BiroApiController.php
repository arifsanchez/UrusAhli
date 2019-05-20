<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Biro;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBiroRequest;
use App\Http\Requests\UpdateBiroRequest;

class BiroApiController extends Controller
{
    public function index()
    {
        $biros = Biro::all();

        return $biros;
    }

    public function store(StoreBiroRequest $request)
    {
        return Biro::create($request->all());
    }

    public function update(UpdateBiroRequest $request, Biro $biro)
    {
        return $biro->update($request->all());
    }

    public function show(Biro $biro)
    {
        return $biro;
    }

    public function destroy(Biro $biro)
    {
        return $biro->delete();
    }
}
