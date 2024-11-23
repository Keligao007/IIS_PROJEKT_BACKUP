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
        Schema::table('kategoria_plodin', function (Blueprint $table) {
            // kategoria_plodin
            $table->foreign('parent_kategoria_id')
                  ->references('id')->on('kategoria_plodin')
                  ->onDelete('cascade');
        });

        Schema::table('kategoria_plodin_atribut', function (Blueprint $table) {
            // kategoria_plodin_atribut
            $table->foreign('id_kategoria_plodin')
                  ->references('id')->on('kategoria_plodin')
                  ->onDelete('cascade');

            $table->foreign('id_atribut')
            ->references('id')->on('atribut')
            ->onDelete('cascade');
        });

        Schema::table('nabidka', function (Blueprint $table) {
            // nabidka
            $table->foreign('id_kategoria_plodin')
                  ->references('id')->on('kategoria_plodin')
                  ->onDelete('cascade');

            $table->foreign('id_uzivatel')
            ->references('id')->on('registrovany_uzivatel')
            ->onDelete('cascade');
        });

        Schema::table('nabidka_atribut', function (Blueprint $table) {
            // nabidka_atribut
            $table->foreign('id_nabidka')
                  ->references('id')->on('nabidka')
                  ->onDelete('cascade');

            $table->foreign('id_atribut')
                  ->references('id')->on('atribut')
                  ->onDelete('cascade');
        });

        Schema::table('navrh_kategorie', function (Blueprint $table) {
            // navrh_kategorie
            $table->foreign('parent_kategoria_id')
                  ->references('id')->on('kategoria_plodin')
                  ->onDelete('cascade');

            $table->foreign('id_uzivatel')
                  ->references('id')->on('registrovany_uzivatel')
                  ->onDelete('cascade');
        });

        Schema::table('navrh_kategorie_atribut', function (Blueprint $table) {
            // navrh_kategorie_atribut
            $table->foreign('id_navrh_kategorie')
                  ->references('id')->on('navrh_kategorie')
                  ->onDelete('cascade');

            $table->foreign('id_atribut')
                  ->references('id')->on('atribut')
                  ->onDelete('cascade');
        });

        Schema::table('objednavka', function (Blueprint $table) {
            // objednavka
            $table->foreign('id_nabidka')
                  ->references('id')->on('nabidka')
                  ->onDelete('cascade');

            $table->foreign('id_uzivatel')
                  ->references('id')->on('registrovany_uzivatel')
                  ->onDelete('cascade');
        });

        Schema::table('objednavka_atribut', function (Blueprint $table) {
            // objednavka_atribut
            $table->foreign('id_objednavka')
                  ->references('id')->on('objednavka')
                  ->onDelete('cascade');

            $table->foreign('id_atribut')
                  ->references('id')->on('atribut')
                  ->onDelete('cascade');
        });

        Schema::table('samozber', function (Blueprint $table) {
            // samozber
            $table->foreign('id_nabidka')
                  ->references('id')->on('nabidka')
                  ->onDelete('cascade');

            $table->foreign('id_uzivatel')
                  ->references('id')->on('registrovany_uzivatel')
                  ->onDelete('cascade');
        });

        Schema::table('samozber_seznam', function (Blueprint $table) {
            // samozber_seznam
            $table->foreign('id_samozber')
                  ->references('id')->on('samozber')
                  ->onDelete('cascade');

            $table->foreign('id_uzivatel')
                  ->references('id')->on('registrovany_uzivatel')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategoria_plodin', function (Blueprint $table) {
            // kategoria_plodin
            $table->dropForeign(['parent_kategoria_id']);
        });

        Schema::table('kategoria_plodin_atribut', function (Blueprint $table) {
            // kategoria_plodin_atribut
            $table->dropForeign(['id_kategoria_plodin']);
            $table->dropForeign(['id_atribut']);
        });

        Schema::table('nabidka', function (Blueprint $table) {
            // nabidka
            $table->dropForeign(['id_kategoria_plodin']);
            $table->dropForeign(['id_uzivatel']);
        });

        Schema::table('nabidka_atribut', function (Blueprint $table) {
            // nabidka_atribut
            $table->dropForeign(['id_nabidka']);
            $table->dropForeign(['id_atribut']);
        });

        Schema::table('navrh_kategorie', function (Blueprint $table) {
            // navrh_kategorie
            $table->dropForeign(['parent_kategoria_id']);
            $table->dropForeign(['id_uzivatel']);
        });

        Schema::table('navrh_kategorie_atribut', function (Blueprint $table) {
            // navrh_kategorie_atribut
            $table->dropForeign(['id_navrh_kategorie']);
            $table->dropForeign(['id_atribut']);
        });

        Schema::table('objednavka', function (Blueprint $table) {
            // objednavka
            $table->dropForeign(['id_nabidka']);
            $table->dropForeign(['id_uzivatel']);
        });

        Schema::table('objednavka_atribut', function (Blueprint $table) {
            // objednavka_atribut
            $table->dropForeign(['id_objednavka']);
            $table->dropForeign(['id_atribut']);
        });

        Schema::table('samozber', function (Blueprint $table) {
            // samozber
            $table->dropForeign(['id_nabidka']);
            $table->dropForeign(['id_uzivatel']);
        });

        Schema::table('samozber_seznam', function (Blueprint $table) {
            // samozber_seznam
            $table->dropForeign(['id_samozber']);
            $table->dropForeign(['id_uzivatel']);
        });
    }
};
