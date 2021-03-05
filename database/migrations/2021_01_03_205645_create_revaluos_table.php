<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevaluosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revaluos', function (Blueprint $table) {
            $table->id('id_revaluo');
            $table->unsignedBigInteger('revision_id');
            $table->unsignedBigInteger('AF_id');
            $table->timestamps();
            $table->unsignedBigInteger('estado_id');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('monto');
            $table->string('descripcion');

            $table->foreign('estado_id')->references('id_estado')->on('estados')->onDelete('cascade');
            $table->foreign('AF_id')->references('id_AF')->on('activos_fijos')->onDelete('cascade');
            $table->foreign('revision_id')->references('id_revision')->on('revisiones_tecnicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revaluos');
    }
}
