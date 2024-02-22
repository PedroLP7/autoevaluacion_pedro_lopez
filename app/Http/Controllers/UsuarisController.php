<?php

namespace App\Http\Controllers;

use App\Models\usuaris;
use Illuminate\Http\Request;
use App\Models\tipus_usuaris;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brick\Math\Internal\Calculator\BcMathCalculator;


class UsuarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  $usuaris=usuaris::paginate(12);
  return view('usuarios.index',compact('usuaris'));
    }


    public function create() {
        $tipos=tipus_usuaris::all();
        return view('usuarios.usuario',compact('tipos'));
    }


    public function store(Request $request){




        $usuario = new usuaris();
        $usuario->nom_usuari = $request->input('nombreUsuario');
        $password =bcrypt($request->input('contrasenya'));
        $usuario->contrasenya = $password;
        $usuario->correu = $request->input('correo');
        $usuario->nom = $request->input('nombre');
        $usuario->cognom = $request->input('apellido');
        if($request->input('activo') == "actiu"){
            $usuario->actiu = 1;
        }else{$usuario->actiu = 0;}
        $usuario->tipus_usuaris_id = $request->input('tipoUsuario');

        try {
            $usuario->save();
            session()->flash('mensaje', 'Usuario creado correctamente');
            $response = redirect()->route('usuaris.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Nombre de usuario o correo ya existente');
            $response = redirect()->route('usuaris.create');

        }
        return $response;

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
    public function update(Request $request, usuaris $usuari){

        $usuari->nom_usuari = $request->input('nombreUsuario');
        $usuari->contrasenya = $request->input('password');
        $usuari->correu = $request->input('correo');
        $usuari->nom = $request->input('nombre');
        $usuari->cognom = $request->input('apellido');
        if($request->input('activo') == "actiu"){
            $usuari->actiu = 1;
        }else{$usuari->actiu = 0;}

        $usuari->tipus_usuaris_id = $request->input('tipoUsuario');

        try {
            $usuari->save();

            session()->flash('mensaje', 'Usuario actualizado correctamente');
            $response = redirect()->route('usuaris.index', compact('usuari'));
        } catch (\Exception $e) {
            session()->flash('error', 'Nombre de usuario o correo ya existente');

            $response = redirect()->route('usuaris.edit', ['usuari' => $usuari]);
        }
        return $response;

    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuaris $usuari)
    {
        try{
            $usuari->delete();
            session()->flash('mensaje', 'Usuario eliminado correctamente');

        }catch(\Exception $e){
            session()->flash('error', 'No se puede eliminar el usuario porque tiene datos relacionados , se dejará inactivo.');
            $usuari->actiu = 0;
            $usuari->save();
        }
       return redirect()->route('usuaris.index');
    }




public function showpass(usuaris $usuari){
    return view('usuarios.password',compact('usuari'));
}



public function updatePassword(Request $request, usuaris $usuari){

    $currentpassword = $request->input('currentContrasenya');




    if (Hash::check($currentpassword, $usuari->contrasenya)) {
        $newPassword = bcrypt($request->input('newContrasenya'));
        $usuari->contrasenya = $newPassword;
        $usuari->save();

        session()->flash('mensaje', 'Contraseña actualizada correctamente');
        $response = redirect()->route('usuaris.index');
    } else {
        session()->flash('error', 'La contraseña actual no es correcta');
        $response = redirect()->route('usuaris.showpass', ['usuari' => $usuari]);
    }

    return $response;
}


    public function prueba(){
        return view('prueba');
    }



    public function showLogin(){




        return view('auth.login');

    }




    public function login(Request $request){


        $username = $request->input('username');
        $password = $request->input('password');

        $user = usuaris::where('nom_usuari', $username)->first();

        if($user !=null && Hash::check($password, $user->contrasenya)){
        Auth::login($user);
            $response = redirect('/home');
            request()->session()->flash('mensaje', 'Bienvenido ' . $user->nom_usuari);

        }else{
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            //  $request->session()->flash($username,$password);
        $response = redirect('/loginForm')->withInput();
        }
        return $response;

}


public function logout(){
    Auth::logout();
    session()->flash('mensaje', 'Sesión cerrada correctamente');
    return redirect('/');
}


}
