<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('user_id');
            $table->smallInteger('tipo');
         //   $table->foreignId('sol_compra_id');
       //     $table->foreignId('sol_mov_id');

   //         $table->foreign('sol_compra_id')->references('id_sol_compra')->on('solicitudes_compras')->cascadeOnDelete()->cascadeOnUpdate();
     //       $table->foreign('sol_mov_id')->references('id_sol_mov')->on('solicitudes_movimientos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('solicitudes');
    }
}
