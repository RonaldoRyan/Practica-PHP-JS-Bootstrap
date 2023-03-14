
 @extends('layouts.plantilla')



@section('title', 'Tienda en línea - Zapatos, Ropa y Accesorios')
@section('styles')
<style>
    body {
        background: url("{{ asset('css/imagenes/bg-tienda.jpg') }}") no-repeat center center fixed;
        background-size: cover;
    }
</style>
@endsection


@section('sidebar')
@parent

<p>Encuentra todo lo que necesitas en nuestra tienda en línea</p>
@endsection



@section('content')

<div class="container my-2 pedido">
    <h2 class="text-center">Información del comprador</h2>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre completo:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre">
                    @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="numero de telefono">
                    @error('telefono')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

    <h2 class="text-center">Información de la compra</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="producto">Producto:</label>
                <select class="form-control" name="producto" id="producto">
                    <option value="">Selecciona un producto</option>
                    @foreach($opciones as $opcion)
                    <option value="{{ $opcion->marca }}" data-precio="{{ $opcion->precio }}" data-id="{{$opcion->id}}">{{ $opcion->marca }}</option>
                    @endforeach
                </select>
                @error('producto')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" value="" readonly>
                <input type="hidden" class="form-control" id="id_producto" name="id_producto" value="" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad" min="1" onchange="actualizarPrecio()">
                @error('cantidad')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>



    <div class="mb-6">
        <label for="talla" class="form-label">Talla:</label>
        <select class="form-select" name="talla" id="talla">
            <option value="s">S</option>
            <option value="m">M</option>
            <option value="l">L</option>
            <option value="xl">XL</option>
        </select>
        @error('talla')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-6">
        <label for="direccion" class="form-label">Dirección de envío:</label>
        <textarea class="form-control" name="direccion" id="direccion" rows="3" placeholder="Indica una Direccion Detallada..."></textarea>
        @error('direccion')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>



    <div class="text-center">
        <input type="submit" class="btn-enviar" name="btEnviar" value="Procesar" id="btEnviar"/>
        &nbsp;
        <input type="reset" class="btn-restablecer" name="btRestablecer" value="Restablecer" />
    </div>
</form>

@endsection








