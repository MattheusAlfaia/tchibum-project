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
        Schema::table('parceiros', function (Blueprint $table) {
            $table->string('comunidade', 255)->nullable();
            $table->string('cidade', 255)->nullable();
            $table->string('numero', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parceiros', function (Blueprint $table) {
            $table->dropColumn('comunidade');
            $table->dropColumn('numero');
            $table->dropColumn('cidade');
        });
    }
};
