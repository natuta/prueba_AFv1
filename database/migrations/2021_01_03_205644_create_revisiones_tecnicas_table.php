<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionesTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisiones_tecnicas', function (Blueprint $table) {
            $table->id('id_revision');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('AF_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedTinyInteger('conclusion');

            $table->foreign('AF_id')->references('id_AF')->on('activos_fijos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('estado_id')->references('id_estado')->on('estados')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('revisiones_tecnicas');
    }
}
