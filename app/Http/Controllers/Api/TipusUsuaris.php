<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TipusResource;
use App\Http\Resources\UsuarisResource;
use App\Models\tipus_usuaris;
use Illuminate\Http\Request;

class TipusUsuaris extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tipus = tipus_usuaris::all();
       return TipusResource::collection($tipus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tipus_usuaris $tipus_usuaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipus_usuaris $tipus_usuaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipus_usuaris $tipus_usuaris)
    {
        //
    }
}
