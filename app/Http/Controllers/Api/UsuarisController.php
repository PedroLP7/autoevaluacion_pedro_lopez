<?php

namespace App\Http\Controllers\Api;

use App\Models\usuaris;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuarisResource;

class UsuarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuaris = Usuaris::with('tipus_usuari')->get();

        return UsuarisResource::collection($usuaris);

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
    public function show(usuaris $usuari)
    {
        $usuari = usuaris::with('moduls')->find($usuari->id);
        return new UsuarisResource($usuari);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuaris $usuaris)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuaris $usuari)
    {
        try {
            $usuari->delete();
            $response = response()
            ->json(['message' => 'Usuari esborrat correctament'], 200);


        } catch (\Throwable $th) {
            // $mensaje = Utilidad::errorMessage($th);
            $response = response()
            ->json(['error' => 'No se puede borrar el usuario porque tiene modulso relacionados'], 400);
        }

        return $response;


    }



    //ESTE METODO CAMBIA LOS MODULOS A LOS QUE ESTA ASIGNADO UN USUARIO
    public function asignarModuls(Request $request, usuaris $usuari)
    {
        $usuari->moduls()->sync($request->moduls);

        return response()->json(['message' => 'Moduls assignats']);
    }



}
