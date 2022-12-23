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
            $table->increments('id');
            $table->unsignedInteger('idUser');
            $table->string('nome');
            $table->unsignedInteger('idMorada');
            $table->string('telemovel');
            $table->string('nif');
            $table->unsignedInteger('idProdutos');
            $table->unsignedInteger('idFavoritos');
            $table->unsignedInteger('idClassificacao');
            $table->string('imagem');
            $table->unsignedInteger('idCargo');
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
