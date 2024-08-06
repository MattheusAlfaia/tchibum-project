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
        Schema::create('pacotes_personalizados', function (Blueprint $table) {
            $table->id();
            $table->float('preco',10,2);
            $table->datetime('data');
            $table->integer('pessoas');
            $table->integer('dias');
            $table->string('status')->default('PENDENTE');

            $table->unsignedBigInteger('comunidade_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();

            $table->foreign("comunidade_id")
            ->references("id")
            ->on("comunidades")
            ->onDelete("cascade");

            $table->foreign("user_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacote_personalizados');
    }
};
