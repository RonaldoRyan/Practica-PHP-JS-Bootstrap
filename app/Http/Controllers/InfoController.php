<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detalleOrden;
use App\Models\producto;


class InfoController extends Controller
{


public function info(){

    return view('records');
}

public function show()
{
    $orderDetails = detalleOrden::all();
    $opciones = producto::all();
    return view('records', compact('orderDetails', 'opciones'));
}


// actualizar los datos
public function update(Request $request, $id){

    $detail = detalleOrden::find($id);

// Validar los datos del formulario
$request->validate([
    'nombre' => 'required|string',
    'email' => 'required|email',
    'telefono' => 'required|string',
    'direccion' => 'required|string',
    'detalle_de_compra' => 'required|string',
]);



$detail->nombre = $request->get('nombre');
$detail->email = $request->get('email');
$detail->telefono = $request->get('telefono');
$detail->direccion = $request->get('direccion');
$detail->detalle_de_compra = $request->get('detalle_de_compra');

// Guardar los cambios en la base de datos
$detail->save();

// Redirigir a la página de detalles de la orden actualizada
return redirect()->route('records', ['id' => $detail->id]);
}




// eliminacion de los datos
public function destroy($id)
{
// Buscar el modelo correspondiente a la orden
$detail = detalleOrden::find($id);

// Eliminar el modelo de la base de datos
$detail->delete();

// Redirigir a la página de listado de ordenes
return redirect()->route('records');
}


}
