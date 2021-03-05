<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_movimientos', function (Blueprint $table) {
            $table->id('id_sol_mov'); //NroMovimiento
            $table->unsignedBigInteger('solicitud_id');

            $table->foreign('solicitud_id')->references('id_solicitud')->on('solicitudes')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('solicitudes_movimientos');
    }
}
