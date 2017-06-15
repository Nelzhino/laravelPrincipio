<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('url');
            $table->bigInteger('busqueda_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('busqueda_id')->references('id')->on('busquedas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contenidos');
    }
}
