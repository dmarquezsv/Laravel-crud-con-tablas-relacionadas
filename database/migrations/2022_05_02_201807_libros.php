<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->bigInteger('categoria_id')->unsigned(); //ASIGNAMOS UN CAMPO PARA LA CATEGORIA

            $table->string('nombre');
            $table->timestamps();
            //referenciamos el campo luego el campo que vamos a realizacionar y la tabla luego el cascade sirve
            //para eliminar la categorias con los libros con esa categoria
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
