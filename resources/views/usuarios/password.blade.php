@extends('Layout.principal')
@section('contenido')



@include('php_partials.mensajes')
<form action="{{ action([App\Http\Controllers\UsuarisController::class, 'updatePassword'], $usuari->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="card">
        <div class="card-title mt-3 px-3 ">

            <H2>Cambiando contraseña</H2>

        </div>


        <div class="card-body">


            <div class="form-group row px-2 mt-3">
                <label for="currentContrasenya" class="col-sm-2 col-form-label">Contraseña Actual</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="currentContrasenya" name="currentContrasenya" value="">
                </div>
            </div>





            <div class="form-group row px-2 mt-3">
                <label for="newContrasenya" class="col-sm-2 col-form-label">Nueva Contraseña</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="newContrasenya" name="newContrasenya" value="">
                </div>
            </div>

                 <div class="form-group mt-3">
                <button  class="btn btn-secondary" type="submit">Aceptar</button>
              </div>
          </form>

            </div>


        </div>




@endsection
