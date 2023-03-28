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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('id_imagem')->default(1);
            $table->foreign('id_imagem')->references('id')->on('imagens');
            $table->unsignedBigInteger('id_categoria')->default(1);
            $table->integer('preco');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->string('morada');
            $table->string('descricao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
