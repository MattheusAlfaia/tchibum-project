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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf',14)->nullable()->unique();
            $table->string('uf')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cep',9)->nullable();
            $table->string('cidade')->nullable();
            $table->string('identificacao')->nullable()->unique();
            $table->string('proficao')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('estado');
            $table->string("role")->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
