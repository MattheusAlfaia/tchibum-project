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
            $table->boolean('por_grupo')->default(false)->nullable();
            $table->integer('tamanho_grupo')->nullable();
        });
    }

    public function down()
    {
        Schema::table('opcoes', function (Blueprint $table) {
            $table->dropColumn('por_grupo');
            $table->dropColumn('tamanho_grupo');
        });
    }
};
