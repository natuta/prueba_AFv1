<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesDeComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_de_compras', function (Blueprint $table) {
            $table->id('id_det_compra');
            $table->unsignedBigInteger('sol_compra_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('detalle');
            $table->unsignedBigInteger('cantidad');
            $table->unsignedFloat('costo');
            $table->unsignedFloat('total');

            $table->foreign('categoria_id')->references('id_categoria')->on('categorias')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('sol_compra_id')->references('id_sol_compra')->on('solicitudes_compras')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('detalles_de_adquisiciones');
    }
}
