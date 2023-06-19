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
            $table->unsignedBigInteger('idUser')->nullable();
            $table->foreign('idUser')->references('id')->on('users');
            $table->string('nome');
            $table->unsignedBigInteger('id_categoria')->default(1);
            $table->integer('preco');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->string('morada');
            $table->string('descricao');
            $table->timestamps();
        });



        // DB::table('produtos')->insert([
        //     ['nome' => 'vazio', 'preco' =>1 , 'morada' => 'vazio', 'descricao' => 'vazio'],
        // ]);
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
