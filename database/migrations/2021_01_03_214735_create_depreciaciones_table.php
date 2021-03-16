<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepreciacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depreciaciones', function (Blueprint $table) {
            $table->id('id_depreciacion');
            $table->timestamps();
            $table->unsignedBigInteger('depreciacion_acumulada');
            $table->string('descripcion');
            $table->date('fecha');
            $table->unsignedBigInteger('AF_id');// valor compra
            $table->unsignedBigInteger('rubro_id');//años de vida y porcentaje

            $table->foreign('AF_id')->references('id_AF')->on('activos_fijos')->onDelete('cascade');
            $table->foreign('rubro_id')->references('id_rubro')->on('rubros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depreciaciones');
    }
}
