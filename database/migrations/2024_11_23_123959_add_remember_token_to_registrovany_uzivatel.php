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
        Schema::table('registrovany_uzivatel', function (Blueprint $table) {
            $table->rememberToken()->after('password'); // Pridá stĺpec remember_token
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('registrovany_uzivatel', function (Blueprint $table) {
            $table->dropColumn('remember_token'); // Odstráni stĺpec pri rollbacku
        });
    }
};
