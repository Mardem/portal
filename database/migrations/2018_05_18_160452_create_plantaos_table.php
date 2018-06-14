<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('endereco')->nullable();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('termino')->nullable();
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
        Schema::dropIfExists('plantaos');
    }
}
