<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisossubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisossubmenus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_permisoMenu');
            $table->foreign('id_permisoMenu')->references('id')->on('permisomenus');
            $table->string('nombre',60);
            $table->string('estado',15);
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
        Schema::dropIfExists('permisossubmenus');
    }
}
