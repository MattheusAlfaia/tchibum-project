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
        Schema::create('pacotepersousuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacoteperso_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('pacoteperso_id')->references('id')->on('pacotes_personalizados')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('data');
            $table->string('status')->default('PENDENTE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacotepersousuarios');
    }
};
