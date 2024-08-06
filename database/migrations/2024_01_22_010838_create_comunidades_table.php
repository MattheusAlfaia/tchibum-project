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
        Schema::create('comunidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome',35);
            $table->string('titulo',80);
            $table->string('descricao',1200);
            $table->string('latitude',255)->nullable();
            $table->string('longitude',255)->nullable();
            $table->string('endereço',255);
            $table->string('imagem_principal',255);
            $table->string('imagens_secundarias',1000)->nullable();
            $table->string('video',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidades');
    }
};
