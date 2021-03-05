<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_compras', function (Blueprint $table) {
            $table->id('id_sol_compra');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('solicitud_id');
            $table->string('nombre'); //nombre del activo que se desa comprar

            $table->foreign('proveedor_id')->references('id_proveedor')->on('proveedores')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('solicitud_id')->references('id_solicitud')->on('solicitudes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_compras');
    }
}
