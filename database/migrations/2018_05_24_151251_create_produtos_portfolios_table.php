<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('local')->nullable();
            $table->string('link')->nullable();
            $table->integer('empresa')->nullable();
            $table->integer('tipo')->nullable();
            $table->string('nome')->nullable();
            $table->string('desc')->nullable();
            $table->string('preco')->nullable();
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
        Schema::dropIfExists('produtos_portfolios');
    }
}
