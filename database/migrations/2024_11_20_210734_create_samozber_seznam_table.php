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
        Schema::create('samozber_seznam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_samozber');
            $table->unsignedBigInteger('id_uzivatel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samozber_seznam');
    }
};
