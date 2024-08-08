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
        Schema::create('calendar', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();

            $table->unsignedBigInteger('comunidade_id')->nullable();
            $table->foreign('comunidade_id')->references('id')->on('comunidades')->onDelete('set null');

            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar');
    }
};
