<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertype', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->string('nome');
            $table->unsignedBigInteger('idMorada');
            $table->foreign('idMorada')->references('id')->on('morada');
            $table->string('telemovel');
            $table->string('nif');
            $table->unsignedBigInteger('idProdutos');
            $table->foreign('idProdutos')->references('id')->on('produtos');
            $table->unsignedBigInteger('idFavoritos');
            $table->foreign('idFavoritos')->references('id')->on('favoritos');
            $table->unsignedBigInteger('idClassificacao');
            $table->foreign('idClassificacao')->references('id')->on('classificacao');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usertype');
    }
};
