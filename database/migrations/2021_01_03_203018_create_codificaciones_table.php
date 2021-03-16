<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codificaciones', function (Blueprint $table) {
            $table->id('id_codificacion');
            $table->timestamps();
            $table->unsignedBigInteger('AF_id');
            $table->string('codigo');


            $table->foreign('AF_id')->references('id_AF')->on('activos_fijos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codificaciones');
    }
}
