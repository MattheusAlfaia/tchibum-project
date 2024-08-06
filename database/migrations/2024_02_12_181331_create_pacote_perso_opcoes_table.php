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
        Schema::create('pacotepersoopcoe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacoteperso_id');
            $table->unsignedBigInteger('opcaoperso_id');
            $table->foreign('pacoteperso_id')->references('id')->on('pacotes_personalizados')->onDelete('cascade');
            $table->foreign('opcaoperso_id')->references('id')->on('opcoes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacotepersoopcoes');
    }
};
