<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProducto',30);
            $table->string('descripcion',100);
            $table->decimal('precio',10,2);
            $table->date('fechaCompra');
            $table->date('fechaAlta');
            $table->string('estado',20)->default('abierto');
            $table->string('comentario',100)->nullable();
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('sucursal_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categories');
            $table->foreign('sucursal_id')->references('id')->on('subsidiaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
