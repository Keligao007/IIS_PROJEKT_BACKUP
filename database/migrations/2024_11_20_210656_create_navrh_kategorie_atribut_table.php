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
        Schema::create('navrh_kategorie_atribut', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_navrh_kategorie');
            $table->unsignedBigInteger('id_atribut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navrh_kategorie_atribut');
    }
};
