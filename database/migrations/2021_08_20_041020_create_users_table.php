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
            $table->string('email')->unique();
            $table->string('username');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('adm_rols');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tel',9);
            $table->string('cel',9);            
            $table->string('tiq',20);
            $table->string('foto',150);
            $table->string('eliminado')->default('false');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
