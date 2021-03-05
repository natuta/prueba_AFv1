<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->string('nombre');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('contacto_id')->nullable();


            $table->foreign('estado_id')->references('id_estado')->on('estados')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('contacto_id')->references('id_contacto')->on('contactos')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('proveedores');
    }
}
