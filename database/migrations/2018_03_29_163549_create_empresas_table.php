<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('categoria');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('numero');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('cnpjView')->nullable();
            $table->string('razaoSocial')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('googlePlus')->nullable();
            $table->string('youtube')->nullable();
            $table->string('plano')->nullable();
            $table->string('vinculo')->nullable();
            $table->string('link')->nullable();
            $table->string('imagem')->nullable();
            $table->string('revisado')->nullable();
            $table->string('codigo')->nullable();
            $table->string('cpf')->nullable();
            $table->timestamps();
        }
        );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
