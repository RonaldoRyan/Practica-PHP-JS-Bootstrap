<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleOrden extends Model
{

    use HasFactory;
    protected $table = 'detalles_orden';
    protected $fillable = [
        'direccion',
        'nombre',
        'email',
        'telefono',
         'detalle_de_compra',
         'total_a_pagar',

   ];
}
