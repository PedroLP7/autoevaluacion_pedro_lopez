@extends('Layout.principal')
@section('contenido')



@include('php_partials.mensajes')
<form action="{{ action([App\Http\Controllers\UsuarisController::class, 'store']) }}" method="POST">
    @csrf
   @method('POST')
    <div class="card">
        <div class="card-title mt-3 px-3 ">

            <H2>Creando usuario nuevo </H2>

        </div>


        <div class="card-body">
            <div class="form-group row px-2">
                <label for="nombreUsuario" class="col-sm-2 col-form-label">Nombre Usuario</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" value="">
                </div>
            </div>





            <div class="form-group row px-2 mt-3">
                <label for="contrasenya" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="contrasenya" name="contrasenya" value="">
                </div>
            </div>



            <div class="form-group row mt-3 px-2">
              <label for="correo" class="col-sm-2 col-form-label">Correo</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="correo" name="correo" value="">
              </div>
            </div>

            <div class="form-group row mt-3 px-2">
                <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="">
                </div>
            </div>

            <div class="form-group row mt-3 px-2">
                <label for="apellido" class="col-sm-2 col-form-label">apellido</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="apellido" name="apellido" value="">
                </div>
            </div>



            <div class="form-group row mt-3 px-2">
                <label for="tipoUsuario" class="col-sm-2 col-form-label">Tipo Usuario</label>
                <div class="col-sm-10">
                <select class="form-select" name="tipoUsuario" id="tipoUsuario">
                    @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}" >{{$tipo->tipus}}</option>
                    @endforeach
                </select>
                </div>
            </div>




            <div class=" mt-3 ">
                <label class="form-check-label px-2" for="flexCheckChecked">
                   Actiu
                  </label>
                <input class="form-check-input" type="checkbox" value="actiu" id="activo" name="activo"
                 >

              </div>
              <div class="form-group mt-3">
                <button  class="btn btn-secondary" type="submit">Aceptar</button>
              </div>
          </form>

            </div>


        </div>




@endsection
