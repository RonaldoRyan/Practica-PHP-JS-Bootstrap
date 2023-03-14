<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\detalleOrden;
use App\Models\producto;
use App\Models\cliente;
use App\Models\User;

class Order extends Model {
private $idPedido;
private $nombre;
private $email;
private $telefono;
private $producto;
private $precio;
private $cantidad;
private $talla;
private $direccion;

public function __construct() {
$this->idPedido = 0;
$this->nombre = "";
$this->email = "";
$this->telefono= "";
$this->producto= "";
$this->precio= "";
$this->cantidad = 0;
$this->talla = "";
$this->direccion = "";
}


public function __get($property)
{
if (property_exists($this, $property)) {
    return $this->$property;
}
}

public function __set($property, $value)
{
if (property_exists($this, $property)) {
    $this->$property = $value;
}
return $this;
}
}


class OrderController extends Controller
{

public function show()
    {
        $detalleOrden = detalleOrden::all();
        return view('records', compact('detalleOrden'));

    }

public function pedido()
{
    $opciones = producto::all();

    return view('pedido', compact('opciones'));
}
public function store(Request $request)
{

    $detalleOrden = new Order();
    $detalleOrden->nombre = $request->get('nombre');
    $detalleOrden->telefono = $request->get('telefono');
    $detalleOrden->email = $request->get('email');
    $detalleOrden->producto = $request->get('producto');
    $detalleOrden->precio = $request->get('precio');
    $detalleOrden->cantidad = $request->get('cantidad');
    $detalleOrden->talla = $request->get('talla');
    $detalleOrden->direccion = $request->get('direccion');
    $detalleOrden->idproducto = $request->get('id_producto');

    // llamamos la funcion para guardar los datos
    $this->guardarDatos($request);

    return view('show', compact('detalleOrden'));
}


// validacion de los datos y guardado de los mismos en la base de datos
public function guardarDatos(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'nombre' => 'required|string',
        'email' => 'required|email',
        'producto'=>'required|string',
        'precio'=>'required|string',
        'telefono' => 'required|string',
        'direccion' => 'required|string',
    ]);

// ingreso de los datos
    $orden = new detalleOrden();
    $orden->direccion = $request->get('direccion');
    $orden->nombre = $request->get('nombre');
    $orden->email = $request->get('email');
    $orden->telefono = $request->get('telefono');
    $orden->detalle_de_compra = $request->get('producto');
    $orden->total_a_pagar = $request->get('precio');
    $orden->producto_id = $request->get('id_producto');
    $orden->cliente_id = $user->id; // Asignar el id del usuario que inicio sesion


    // guardado
    $orden->save();

}

}



