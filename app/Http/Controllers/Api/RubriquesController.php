<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RubriquesResource;
use App\Models\rubriques;
use Illuminate\Http\Request;

class RubriquesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
           $rubriques = rubriques::all();
           $response = RubriquesResource::collection($rubriques);
        } catch (\Throwable $th) {
            $response = response()->json(['error' => 'An error occurred while processing your request'], 500);

        }
        return $response;


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(rubriques $rubriques)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rubriques $rubriques)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rubriques $rubriques)
    {
        //
    }

    public function nivell1()
    {
        try {
            $rubriques = rubriques::where('nivell', 1)->get();
            $response = RubriquesResource::collection($rubriques);
        } catch (\Throwable $th) {
            $response = response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
        return $response;
    }
}
