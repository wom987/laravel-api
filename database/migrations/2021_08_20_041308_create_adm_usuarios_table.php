<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usu',25);
            $table->string('pas');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('adm_rols');
            $table->string('tiq',20);
            $table->string('nom',40);
            $table->string('tel',9);
            $table->string('cel',9);
            $table->string('mail');
            $table->string('foto',150);
            $table->string('eliminado')->default('false');
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
        Schema::dropIfExists('adm_usuarios');
    }
}
