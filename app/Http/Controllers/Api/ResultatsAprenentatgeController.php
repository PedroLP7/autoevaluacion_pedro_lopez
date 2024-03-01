<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\resultats_aprenentatge;
use Illuminate\Http\Request;
use App\Http\Resources\ResultatsResource;

class ResultatsAprenentatgeController extends Controller
{















    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $resultats= resultats_aprenentatge::with('criteris_avaluacio')->get();
            $response = ResultatsResource::collection($resultats);
        } catch (\Throwable $th) {
            $response = response()->json(['message' => 'No s\'han trobat resultats']);
        }

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultat = new resultats_aprenentatge();
        $resultat->ordre = $request->ordre;
        $resultat->descripcio = $request->descripcio;
        $resultat->actiu = $request->actiu == 1 ? 1 : 0;
        $resultat->moduls_id = $request->moduls_id;
        try {
            $resultat->save();
            return response()->json(['message' => 'Resultat creat']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al crear el resultat']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(resultats_aprenentatge $resultats_aprenentatge)
    {
        try {
            $resultat=resultats_aprenentatge::with('criteris_avaluacio')->find($resultats_aprenentatge->id);
            return response()->json($resultat);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'No s\'ha trobat el resultat']);
        }

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, resultats_aprenentatge $resultats_aprenentatge){
        $resultats_aprenentatge->ordre = $request->ordre;
        $resultats_aprenentatge->descripcio = $request->descripcio;
        $resultats_aprenentatge->actiu = $request->actiu == 1 ? 1 : 0;
        $resultats_aprenentatge->moduls_id = $request->moduls_id;
    try {
     $resultats_aprenentatge->save();
     return response()->json(['message' => 'Resultat actualitzat']);
    } catch (\Throwable $th) {
        return response()->json(['message' => 'Error al guardar el resultat']);
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(resultats_aprenentatge $resultats_aprenentatge)
    {
        try {
            $resultats_aprenentatge->delete();
            return response()->json(['message' => 'Resultat eliminat']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No es pot eliminar un resultat que té criteris assignats']);
        }

    }
}
