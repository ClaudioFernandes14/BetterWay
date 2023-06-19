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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('idFavoritos')->nullable();
            $table->foreign('idFavoritos')->references('id')->on('favoritos');
            $table->unsignedBigInteger('idClassificacao')->nullable();
            $table->foreign('idClassificacao')->references('id')->on('classificacao');
            // $table->unsignedBigInteger('idMorada');
            // $table->foreign('idMorada')->references('id')->on('morada');
            // $table->string('telemovel')->nullable();
            // $table->string('nif')->nullable();
            
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

        // Schema::table('usertype', function (Blueprint $table){
        //     $table->string('column_name')->nullable(false)->change();
        // });
    }
};
