<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_orden', function (Blueprint $table) {
            $table->id();

            $table->text('direccion');
            $table->string('nombre',50);
            $table->string('email',50);
            $table->string('telefono',50);
            $table->text('detalle_de_compra');
            $table->decimal('total_a_pagar', 15, 2); // Cambiamos a decimal con precisión de 15, 2

            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('cliente_id');

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_orden');
    }
};
