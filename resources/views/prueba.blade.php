@extends('Layout.principal')

@section('contenido')
@include('php_partials.mensajes')
{{ "hola esto es la prueba"}}


<button class="btn btn-primary">PRUEBA</button>
@if (Auth::check())
{{Auth::user()->nom .Auth::user()->cognom  . Auth::user()->tipus_usuaris_id}}
@else
{{"no hay usuario logeado"}}
@endif

@endsection
