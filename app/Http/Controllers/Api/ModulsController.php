<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ModulsResource;
use App\Models\moduls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModulsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $moduls = moduls::all();
            return response()->json($moduls);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al mostrar los modulos: ' . $th->getMessage()], 500);
        }
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
    public function show(moduls $modul)
    {
        try {
            $modul = moduls::with('resultats_aprenentatge.criteris_avaluacio.rubriques')->find($modul->id);
            return  new ModulsResource($modul);

        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al mostrar el usuario: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, moduls $moduls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(moduls $moduls)
    {
        //
    }
}
