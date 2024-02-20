@extends('Layout.principal')
@section('contenido')


@include('php_partials.mensajes')
{{ 'BIENVENIDO QUERIDO ' . Auth::user()->nom . ' ' . Auth::user()->cognom . ' ' . Auth::user()->tipus_usuaris_id}}







@endsection
