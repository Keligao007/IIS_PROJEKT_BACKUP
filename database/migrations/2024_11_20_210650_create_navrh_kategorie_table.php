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
        Schema::create('navrh_kategorie', function (Blueprint $table) {
            $table->id();
            $table->string('meno');
            $table->unsignedBigInteger('parent_kategoria_id')->nullable();
            $table->unsignedBigInteger('id_uzivatel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navrh_kategorie');
    }
};
