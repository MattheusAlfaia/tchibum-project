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
        Schema::create('sobre', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_principal',40);
            $table->string('sobre',700);

            $table->string('nome_atividade_comunidade1',25);
            $table->string('descricao_atividade_comunidade1',125);
            $table->string('imagem_atividade_comunidade1',255);

            $table->string('nome_atividade_comunidade2',25);
            $table->string('descricao_atividade_comunidade2',125);
            $table->string('imagem_atividade_comunidade2',255);

            $table->string('nome_atividade_comunidade3',25);
            $table->string('descricao_atividade_comunidade3',125);
            $table->string('imagem_atividade_comunidade3',255);

            $table->string('nome_atividade_comunidade4',25);
            $table->string('descricao_atividade_comunidade4',125);
            $table->string('imagem_atividade_comunidade4',255);

            $table->string('video_principal',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sobre');
    }
};
