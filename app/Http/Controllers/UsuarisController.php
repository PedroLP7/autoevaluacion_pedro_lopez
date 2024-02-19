<?php

namespace App\Http\Controllers;

use App\Models\tipus_usuaris;
use App\Models\usuaris;
use Illuminate\Http\Request;

class UsuarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  $usuaris=usuaris::all();
  return view('usuarios.index',compact('usuaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(usuaris $usuaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuaris $usuari)
    {

        $tipos=tipus_usuaris::all();
        return view('usuarios.edit',compact('usuari','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuaris $usuari)
{

    $usuari->nom_usuari = $request->input('nombreUsuario');
    $usuari->contrasenya = $request->input('password');
    $usuari->correu = $request->input('correo');
    $usuari->nom = $request->input('nombre');
    $usuari->cognom = $request->input('apellido');
    $usuari->actiu = $request->input('activo') == "1" ? 1 : 0;
    $usuari->tipus_usuaris_id = $request->input('tipoUsuario');

    // No asignar un nuevo valor a contrasenya para mantener el valor existente

    $usuari->save();
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuaris $usuaris)
    {
        //
    }
}
