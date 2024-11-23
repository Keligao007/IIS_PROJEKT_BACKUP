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
        Schema::table('registrovany_uzivatel', function (Blueprint $table) {
            //
            $table->enum('type', ['admin', 'moderator', 'regular'])->default('regular');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrovany_uzivatel', function (Blueprint $table) {
            //
            $table->dropColumn('type');
        });
    }
};
