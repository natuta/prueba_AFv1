<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido',40)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('sexo')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('contacto_id')->nullable();
            //$table->unsignedBigInteger('rol_id');
            $table->timestamps();

            $table->foreign('estado_id')->references('id_estado')->on('estados')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('contacto_id')->references('id_contacto')->on('contactos')->cascadeOnDelete()->cascadeOnUpdate();
            //$table->foreign('rol_id')->references('id_rol')->on('roles')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
