<?php

namespace App\Http\Controllers\Api;

use App\Models\criteris_avaluacio;
use App\Models\usuaris;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $usuario = new usuaris();
        $usuario->nom_usuari = $request->input('nom_usuari');
        $password =bcrypt($request->input('contrasenya'));
        $usuario->contrasenya = $password;
        $usuario->correu = $request->input('correu');
        $usuario->nom = $request->input('nom');
        $usuario->cognom = $request->input('cognom');
        if($request->input('activo') == "actiu"){
            $usuario->actiu = 1;
        }else{$usuario->actiu = 0;}
        $usuario->tipus_usuaris_id = $request->input('tipus_usuaris_id');

        try {
            $usuario->save();

            $response =  response()->json(['message' => 'Usuari creat correctament'], 200);
        } catch (\Throwable $th) {

            $response = response()->json(['error' => 'Nombre de usuario o correo ya existente',$th], 400);

        }
        return $response;
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




    public function getUsuario(Request $request)
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            return response()->json([$userid], 200);
        } else {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }


    public function setNotas(Request $request, usuaris $usuari){
        try {
            $notas = $request->input('notas');

            // recorro las notas y las guardo en un array con el id del criterio como clave

            $criterisAvaluacioData = [];
            foreach ($notas as $nota) {
                $criterisAvaluacioData[$nota['criteri_avaluacio_id']] = ['nota' => $nota['nota']];
            }

            // uso el syncWithoutDetaching para que no se borren las notas anteriores y añadir y updatear las nuevas
            $usuari->criteris_avaluacio()->syncWithoutDetaching($criterisAvaluacioData);

            return response()->json(['message' => 'Notas insertadas o actualizadas correctamente'], 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al insertar o actualizar las notas', 'details' => $th->getMessage()], 400);
        }
    }



    // public function getNotas(usuaris $usuari){
    //     $notas = $usuari->criteris_avaluacio;
    //     return response()->json($notas, 200);
    // }


    public function getNotas(usuaris $usuari)
    {
        $usuari = usuaris::with('criteris_avaluacio')->find($usuari->id);
        return new UsuarisResource($usuari);
    }



     public function index2(){


        $usuaris = Usuaris::where('tipus_usuaris_id', 3)->with('moduls.resultats_aprenentatge.criteris_avaluacio')->get();
        // $usuaris = Usuaris::where('tipus_usuaris_id', 3)->with('criteris_avaluacio.resultats_aprenentatge.moduls')->get();


        return UsuarisResource::collection($usuaris);


     }





}
