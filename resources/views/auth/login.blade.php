@extends('Layout.principal')
@section('contenido')



@include('php_partials.mensajes')
<form method="POST" action="{{action([App\Http\Controllers\UsuarisController::class,'login'])}}" >
    @csrf

    <div class="card">
        <div class="card-title mt-3 px-3 ">


        <h3>{{'Login'}}</h3>
        </div>


        <div class="card-body">
            <div class="form-group row px-2">
                <label for="username" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
                </div>
            </div>
            <div class="form-group row mt-3 px-2">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
              </div>
            </div>




            <button  class="btn btn-primary"type="submit">Aceptar</button>

          </form>

            </div>


        </div>




@endsection
