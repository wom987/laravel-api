<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisomenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisomenus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->unsignedBigInteger('id_user');
            
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nombre');
            $table->string('estado')->default('activo');
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
        Schema::dropIfExists('permisomenus');
    }
}
