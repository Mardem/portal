<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');

            // Topo
            $table->string('corLinks')->nullable();

            // Entrada
            $table->string('fundoCor')->nullable();
            $table->string('fundoImg')->nullable();
            $table->string('corPrincipal')->nullable();
            $table->string('sombraPrincipal')->nullable();
            $table->string('subtitulo')->nullable();
            $table->string('categoria')->nullable();
            // Oferta
            $table->string('tipoBannerOferta')->nullable();
            $table->string('fundoOferta')->nullable();
            $table->string('frenteOferta')->nullable();
            $table->string('txtOferta')->nullable();
            // Produto
            $table->string('tipoBannerProduto')->nullable();
            $table->string('fundoProduto')->nullable();
            $table->string('txtProduto')->nullable();
            // Contato
            $table->longText('sobre')->nullable();
            $table->longText('mapa')->nullable();
            // Footer
            $table->string('endereco')->nullable();
            $table->string('chamada')->nullable();
            $table->string('email')->nullable();
            // Publicado : 1 (Sim) 0 (Não)
            $table->string('publicar')->nullable();
            // Relações
            $table->integer('empresa')->nullable();

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
        Schema::dropIfExists('portfolios');
    }
}
