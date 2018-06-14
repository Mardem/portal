<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');

            // Inf. sobre o evento
            $table->string('evento')->nullable();
            $table->string('data')->nullable();
            $table->string('hora')->nullable();
            $table->string('descricao')->nullable();
            $table->string('local')->nullable();
            $table->integer('ingresso')->nullable();
            $table->string('valor_ingresso')->nullable();

            // Inf. sobre usuário
            $table->string('nome_responsavel')->nullable();
            $table->string('cpf')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();

            // Redes sociais do evento
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();

            // URL banner do evento
            $table->string('img')->nullable();
            // Link do evento
            $table->string('link');

            // Pontos de vendas
            $table->string('vendas')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('eventos');
    }
}
