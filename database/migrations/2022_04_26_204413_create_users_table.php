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
            $table->string('nombre',60);
            $table->string('apellidoPaterno',60);
            $table->string('apellidoMaterno',60);
            $table->string('correo',255)->unique();
            $table->string('clave',255);
            $table->string('remember_token',255)->nullable()->default(null);
            $table->smallInteger('acceso')->default(1);
            $table->bigInteger('perfil_id')->unsigned()->default(2);
            $table->foreign('perfil_id')->references('id')->on('profiles');
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

