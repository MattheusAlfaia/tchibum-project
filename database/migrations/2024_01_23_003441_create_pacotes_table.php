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
        Schema::create('pacotes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',35);
            $table->string('titulo',100);
            $table->string('descricao',300);
            $table->string('imagem_principal',255);
            $table->string('imagens_secundarias',500)->nullable();
            $table->float('preco',10,2);
            $table->datetime('data');
            $table->datetime('data_final')->nullable();
            $table->string('infos',1000)->nullable();
            $table->string('video',50)->nullable();
            $table->integer('pessoas')->nullable();
            $table->integer('dias')->nullable();

            $table->unsignedBigInteger('comunidade_id')->unsigned();

            $table->foreign("comunidade_id")
            ->references("id")
            ->on("comunidades")
            ->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacotes');
    }
};
