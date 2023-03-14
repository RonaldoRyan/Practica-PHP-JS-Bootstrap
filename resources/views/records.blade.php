@extends('layouts.plantilla')

@section('styles')
   <style>
    body {
        background:#0c0c0ce7;
        color: white;
    }
</style>
   @endsection

@section('content')
<h1>Seccion de informacion</h1>
<div class="row">
<div class="col-md-12">
<h2>Registros anteriores:</h2>

<div class="table-responsive divInfo">
<table class="table">
<thead>
<tr>
    <th>Direccion</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Telefono</th>
    <th>Total a Pagar</th>
    <th></th>
</tr>
</thead>
<tbody>
@foreach($orderDetails as $detail)
<tr>
    <td>{{ $detail->direccion }}</td>
    <td>{{ $detail->nombre }}</td>
    <td>{{ $detail->email }}</td>
    <td>{{ $detail->telefono }}</td>
    <td>{{ $detail->total_a_pagar }}</td>
    <td>
        <form action="{{ route('show', $detail) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="button" data-toggle="modal" data-target="#actualizarModal{{ $detail->id }}" class="btn btn-primary btn-sm" data-detalle-id="{{$detail->id}}" id="btnActualizar">Actualizar</button>
        </form>
        <form action="{{ route('show', $detail->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm mr-3">Eliminar</button>
        </form>



        <div class="modal fade modal-update" id="actualizarModal{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="actualizarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered insideModal" role="document">
                <div class="modal-content">
                <form id="formActualizar" action="{{ route('show', $detail->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header modal-header-update">
                    <h5 class="modal-title" id="actualizarModalLabel">Actualizar Datos Personales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body modal-body-update">
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $detail->direccion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $detail->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $detail->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $detail->telefono }}" required>
                    </div>
                    <div class="form-group">
                   <div class="form-group">
                <input hidden type="text" class="form-control" id="detalle_de_compra" name="detalle_de_compra" value="{{ $detail->detalle_de_compra}}" required>

                    </div>
                <input type="hidden" id="detalle_id" name="detalle_id" value="{{$detail->id}}">
                    </div>
                    <div class="modal-footer modal-footer-update">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>

                </form>

                </div>
            </div>
            </div>


</td>
</tr>

@endforeach
</tbody>
</table>
</div>
</div>
@endsection

