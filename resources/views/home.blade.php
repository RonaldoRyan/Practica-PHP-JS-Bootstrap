@extends('layouts.plantilla')

@section('content')
<h1>Pagina a la que accedemos unicamente estando registrados</h1>

<p>Esta página solo se puede acceder si has iniciado sesión.</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>
@endsection
