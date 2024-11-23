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
        Schema::create('kategoria_plodin_atribut', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategoria_plodin');
            $table->unsignedBigInteger('id_atribut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoria_plodin_atribut');
    }
};
