<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosFijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos_fijos', function (Blueprint $table) {
            $table->id('id_AF');
            $table->string('nombre');
            $table->date('fecha_obtencion');
            $table->unsignedFloat('valor_compra');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('almacen_id');
            $table->timestamps();

            $table->foreign('almacen_id')->references('id_almacen')->on('almacenes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('departamento_id')->references('id_departamento')->on('departamentos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('categoria_id')->references('id_categoria')->on('categorias')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('estado_id')->references('id_estado')->on('estados')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activos_fijos');

    }
}
