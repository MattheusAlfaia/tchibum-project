<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('opcoes', function (Blueprint $table) {
            $table->string('nome')->change();
            $table->string('titulo')->change();

            $table->text('descricao')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opcoes', function (Blueprint $table) {
            $table->string('nome')->change();
            $table->string('titulo')->change();
            $table->string('descricao')->change();
        });
    }
};
