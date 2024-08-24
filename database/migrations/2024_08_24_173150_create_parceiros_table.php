<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parceiros', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('seguimento',255);
            $table->string('responsavel', 255);
            $table->string('cargo', 255);
            $table->string('cnpj', 18)->nullable();
            $table->string('cadastur', 255)->nullable();
            $table->string('email', 255);
            $table->string('endereco', 255);
            $table->string('cep', 9);
            $table->text('mensagem')->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->boolean('accepted_terms')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parceiros');
    }
};
