<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_solicitudes', function (Blueprint $table) {
            $table->id('id_detalle_solicitud');
            $table->unsignedBigInteger('solicitud_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('descripcion');
            $table->integer('cantidad');

            $table->foreign('solicitud_id')->references('id_solicitud')->on('solicitudes')->OnDelete('cascade');
            $table->foreign('categoria_id')->references('id_categoria')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('detalles_solicitudes');
    }
}
