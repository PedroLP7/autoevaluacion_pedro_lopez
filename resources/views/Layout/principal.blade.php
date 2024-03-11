<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite(['resources/css/app.css','resources/css/app.scss', 'resources/js/app.js'])

</head>
<body>





    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">

                <a class="navbar-brand" href="{{url('/')}}">
                  <img src="{{ asset('img/logo.png') }}" id="imglogo" alt="logia" width="30" height="24" class="d-inline-block align-text-top">

                </a>


          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">




            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
{{-- cambiar esto a un 3 para que sea para el admin  --}}
                @if (Auth::check()&&Auth::user()->tipus_usuaris_id==1)
                <li class="nav-item dropdown  ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Datos Maestros
                    </a>
                    <ul class="dropdown-menu danger">
                      <li><a class="dropdown-item" href="{{url('/usuaris/create')}}">Tipos de usuario</a></li>
                      <li><a class="dropdown-item" href="{{url('/usuaris')}}">Usuarios</a></li>
                      <li><a class="dropdown-item" href="{{url('modul')}}">Ciclos</a></li>
                        <li><a class="dropdown-item" href="{{url('modul')}}">Modulos</a></li>
                        <li><a class="dropdown-item" href="{{url('modul')}}">Asignar Profesor</a></li>
                      <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url('modul')}}">Asignar Alumno</a></li>
                        <li><a class="dropdown-item" href="{{url('modul')}}">Resultado de aprendizaje</a></li>
                        <li><a class="dropdown-item" href="{{url('modul')}}">Criterios de evaluacion</a></li>





                    </ul>
                  </li>
                  @endif


                    @if (Auth::check()&&Auth::user()->tipus_usuaris_id==2)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profesores                  </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url('/proveedor/pedidos/')}}">Asignar alumnos</a></li>
                          <li><a class="dropdown-item" href="{{url('/proveedor/crearmenu')}}">Resultados de aprendizaje</a></li>
                            <li><a class="dropdown-item" href="{{url('/proveedor/crearmenu')}}">Criterios de evaluacion</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="{{url('profesor/eva')}}">Autoevaluacion alumnos</a></li>

                        </ul>
                      </li>

                    @endif


                    @if (Auth::check()&&Auth::user()->tipus_usuaris_id==3)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Alumnos                 </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url('/alumno/autoevaluacion')}}">Autoevaluacion</a></li>


                        </ul>
                      </li>
                    @endif





            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0 p-2 m-3">
                @if (Auth::check())
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{Auth::user()->nom}} {{Auth::user()->cognom}}
                        </a>
                        <ul class="dropdown-menu">
                          <li> <a href="{{url('logout')}}" class="nav-link">Logout</a></li>

                        </ul>
                      </li>





                @else
                <li class="nav-item">
                    <a href="{{url('/loginForm')}}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('register')}}" class="nav-link">Register</a>
                </li>
                @endif









          </div>
        </div>
      </nav>
    <div class="container">
        @yield('contenido')

    </div>
</body>
</html>
