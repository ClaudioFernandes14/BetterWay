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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('morada')->default('Sem morada definida');
            $table->string('cod_postal')->default('Sem codigo postal definido');
            $table->integer('telemovel')->default('1');
            $table->integer('nif')->default('1');
            $table->string('avatar')-> default('guest-image.jpg');
            $table->unsignedBigInteger('idCargo')->default(2);
            $table->foreign('idCargo')->references('id')->on('cargo');
            $table->date('date_of_birth')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $senha = '12345678';
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
        
        DB::insert("INSERT INTO users (name, email, password, idCargo, created_at, updated_at) VALUES ('Claudio', 'adbetterway@mailinator.com', '$senha_criptografada', 1, NOW(), NOW())");

    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
