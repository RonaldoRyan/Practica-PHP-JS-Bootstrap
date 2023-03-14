@extends('layouts.plantilla')




@section('title', 'Bienvenid@ a Nuestra Tienda')


@section('sidebar')
{{-- validacion de si hay un usario conectado o no--}}
<nav class="navbar navbar-expand-lg navbar-light navbar-transparent bg-transparent">
    <div class="container-fluid">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <div class="bg-transparent p-3">
          @auth
            <!-- Contenido para usuarios autenticados -->
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-cerrar ml-2">Cerrar sesión</button>

            </form>
          @else
            <!-- Contenido para usuarios no autenticados -->
            <div class="d-flex ml--auto">
              <button type="button" class="btn btn-user" data-toggle="modal" data-target="#loginModal">
                Iniciar sesión
              </button>
              <button type="button" class="btn btn-login" data-toggle="modal" data-target="#registerModal">
                Registrarse
              </button>
            </div>
          @endauth
        </div>
      </div>
    </div>
  </nav>


@section('styles')
    <style>
        body {
            background-image: radial-gradient(circle, #424141, #464545, #4a494a, #4e4e4e, #525253, #59595a, #5f6061, #666768, #717374, #7c7f80, #888b8b, #949897);
        }
    </style>
@endsection







@endsection

@section('content')
<div class="container panel">
    <div class="text-center">
        <h1>Bienvenido a nuestra tienda en línea</h1>
        <p>¡Tenemos la mejor selección de ropa para ti!</p>
    </div>


    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    </div>

    {{-- modal de registro --}}
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="registerModalLabel">Registro</h5>
        @if(session('register_error'))
        <div class="alert alert-danger">{{ session('register_error') }}</div>
    @endif
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Registrarse</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        </div>
      </form>
    </div>
  </div>
</div>

{{-- modal de inicio de sesion --}}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="email">Correo electrónico</label>
              <input type="email" name="email" id="email" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
                <label for="rememberCheck" class="form-check-label">Mantener Sesion Iniciada</label>
                @if(session('login_error'))
                <div class="alert alert-danger">{{ session('login_error') }}</div>
            @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>





    <div class="row">


        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    @auth
                    <h2>Realizar Pedido</h2>
                    <p>Crea tu Orden</p>
                        <a class="btn btn-index" href="{{ route('pedido') }}" target="_blank">Realizar Pedido</a>
                    @else
                             <h2>Pedido</h2>
                            <p>Crea tu pedido</p>
                        <button class="btn btn-danger" disabled>
                            <i class="bi bi-lock">Inicia Sesion para Acceder</i>
                        </button>
                    @endauth
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    @auth
                    <h2>Registro de Pedidos</h2>
                    <p>Administra los pedidos</p>
                        <a class="btn btn-index" href="{{ route('records') }}" target="_blank">Panel de Registro</a>
                    @else
                             <h2>Registro de Pedidos</h2>
                            <p>Administra los pedidos</p>
                        <button class="btn btn-danger" disabled>
                            <i class="bi bi-lock">Inicia Sesion para Acceder</i>
                        </button>
                    @endauth
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h2>Imágenes</h2>
                    <p>Explora nuestras imágenes de ropa.</p>
                    <a class="btn btn-index" href="{{route('img')}}" target="_blank">Ver Imágenes</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')

<footer>
    <div class="container container-footer">
        <div class="row">
            <div class="col-md-4">
                <h4>Mis Redes</h4>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="https://github.com/RonaldoRyan" target="_blank">
                            <img src="{{ asset('css/png/github.png') }}" alt="gitHub" width="40">
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/ronaldo-ryan-serrano-553718247" target="_blank">
                            <img src="{{ asset('css/png/004-linkedin.png') }}" alt="LinkeInd" width="40">
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>

@endsection



