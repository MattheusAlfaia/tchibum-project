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
        Schema::create('opcoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',35);
            $table->string('titulo',100);
            $table->string('descricao',1200);
            $table->string('imagem',255);
            $table->float('preco',10,2);
            // $table->boolean('por_pessoa')->default(false);

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
        Schema::dropIfExists('opcoes');
    }
};
