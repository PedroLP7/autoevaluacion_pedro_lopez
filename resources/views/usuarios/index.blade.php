@extends('Layout.principal')

@section('contenido')

@include('php_partials.mensajes')


<table class="table">

      <tr>
        <th scope="col">Nombre Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col">Nombre Real</th>
        <th scope="col">Cognom</th>
        <th scope="col">Activo</th>
        <th>Tipo Usuario</th>



      </tr>

    <tbody>

        @foreach ($usuaris as $usuario)
       <td>{{$usuario->nom_usuari}}</td>
       <td>{{$usuario->correu }}</td>
       <td>{{$usuario->nom}}</td>
       <td>{{$usuario->cognom}}</td>
        <td>
<div>
  @if ($usuario->actiu == 1)
      <input type="checkbox" name="activo" id="activo" value="1" checked/>
@else
<input type="checkbox" name="activo" id="activo" value="0"/>
</div>
  @endif
 </td>
 <td>{{$usuario->tipus_usuari->tipus}}</td>
 <td> <form method="get" action="{{ action([App\Http\Controllers\UsuarisController::class, 'edit'], ['usuari' => $usuario]) }}">

    @csrf

                <button class="btn btn-primary" type="submit">Editar</button>
</form></td>






    </tbody>
     @endforeach
    </table>



@endsection


