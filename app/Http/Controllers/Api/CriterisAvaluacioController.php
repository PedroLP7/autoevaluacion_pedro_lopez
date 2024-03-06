<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\criteris_avaluacio;
use Illuminate\Http\Request;

class CriterisAvaluacioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $criteris_avaluacio=criteris_avaluacio::all();
            $response= response()->json($criteris_avaluacio);
        } catch (\Throwable $th) {
           $response= response()->json(['message' => 'No s\'han trobat criteris']);
        }
        return $response;


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $criteri= new criteris_avaluacio();
        $criteri->ordre = $request->ordre;
        $criteri->descripcio = $request->descripcio;
        $criteri->actiu = $request->actiu == 1 ? 1 : 0;
        $criteri->resultats_aprenentatge_id = $request->resultats_aprenentatge_id;
        try {
            $criteri->save();
            $response= response()->json(['message' => 'Criteri creat']);
        } catch (\Throwable $th) {
            $response= response()->json(['message' => 'Error al crear el criteri']);
        }
        return $response;




    }

    /**
     * Display the specified resource.
     */
    public function show(criteris_avaluacio $criteris_avaluacio)
    {
        $criteris_avaluacio=criteris_avaluacio::find($criteris_avaluacio->id);
        return response()->json($criteris_avaluacio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, criteris_avaluacio $criteris_avaluacio){

        $criteris_avaluacio->ordre = $request->ordre;
        $criteris_avaluacio->descripcio = $request->descripcio;
        $criteris_avaluacio->actiu = $request->actiu == 1 ? 1 : 0;
        $criteris_avaluacio->resultats_aprenentatge_id = $request->resultats_aprenentatge_id;
    try {
    $criteris_avaluacio->save();
    $response= response()->json(['message' => 'Criteri actualitzat']);
        } catch (\Throwable $th) {
    $response= response()->json(['message' => 'Error al actualitzar el criteri']);
    }
        return $response;




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(criteris_avaluacio $criteris_avaluacio)
    {

        $criteris_avaluacio->delete();
        return response()->json(['message' => 'Criteri eliminat']);
    }


}
