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
        Schema::create('nabidka', function (Blueprint $table) {
            $table->id();
            $table->string('meno');
            $table->unsignedBigInteger('id_kategoria_plodin');
            $table->unsignedBigInteger('id_uzivatel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nabidka');
    }
};
