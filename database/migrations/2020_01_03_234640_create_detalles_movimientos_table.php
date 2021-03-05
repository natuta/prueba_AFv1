<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_movimientos', function (Blueprint $table) {
            $table->id('id_det_mov');
            $table->unsignedBigInteger('solicitud_mov_id');
            $table->unsignedBigInteger('destino_dpto'); //departamento->id_departamento
            $table->unsignedBigInteger('origen_dpto'); //activofijo->departamento_id
            $table->unsignedBigInteger('af_id'); //activofijo
            $table->unsignedBigInteger('cantidad');

            $table->foreign('destino_dpto')->references('id_departamento')->on('departamentos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('solicitud_mov_id')->references('id_sol_mov')->on('solicitudes_movimientos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('af_id')->references('id_AF')->on('activos_fijos')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('detalles_movimientos');
    }
}
