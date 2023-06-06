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
        Schema::create('imagens', function (Blueprint $table) {
            $table->id();
            $table->string('url')->default('Sem imagens Inseridas');
            $table->unsignedBigInteger('id_produto')->nullable();
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->timestamps();
        });

        // DB::table('imagens')->insert([
        //     ['url' => 'Sem imagens Inseridas'],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagens');
    }
};
