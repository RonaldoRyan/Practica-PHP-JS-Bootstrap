@extends('layouts.plantilla')


   @section('styles')
   <style>
    body {
        background: url("{{ asset('imagenes/bg-tienda.jpg') }}") no-repeat center center fixed;
        background-size: cover;
    }
</style>
   @endsection
  @section('content')
<div class="container containerShow">
<h1>Mi Orden</h1>
<div class="row nota">
<div class="col-md-6">
<div class="form-group">
<label for="nombre">Nombre:</label>
<input type="text" class="form-control" id="nombre" value="{{$detalleOrden->nombre}}" disabled>
</div>
<div class="form-group">
<label for="email">Email:</label>
<input type="email" class="form-control" id="email" value="{{$detalleOrden->email}}" disabled>
</div>
<div class="form-group">
<label for="telefono">Telefono:</label>
<input type="text" class="form-control" id="telefono" value="{{$detalleOrden->telefono}}" disabled>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="producto">Articulo:</label>
<input type="text" class="form-control" id="producto" value="{{$detalleOrden->producto}}" disabled>
</div>
<div class="form-group">
    <label for="producto">Precio:</label>
    <input type="text" class="form-control" id="precio" value="{{$detalleOrden->precio}}" disabled>
</div>
<div class="form-group">
<label for="cantidad">Unidades:</label>
<input type="number" class="form-control" id="cantidad" value="{{$detalleOrden->cantidad}}" disabled>
</div>
<div class="form-group">
<label for="talla">Talla:</label>
<input type="text" class="form-control" id="talla" value="{{$detalleOrden->talla}}" disabled>
</div>
<div class="form-group">
<label for="direccion">Direccion:</label>
<input type="text" class="form-control" id="direccion" value="{{$detalleOrden->direccion}}" disabled>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 text-center">
<a href="{{route('index')}}" class="btn btn-enviar">Continuar</a>



</div>
</div>
</div>



@endsection
