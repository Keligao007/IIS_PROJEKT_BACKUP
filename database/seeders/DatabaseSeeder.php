<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            push_atributes::class,
            push_kategoria_plodin::class,
            push_kategoria_plodin_atribut::class,
            push_registrovany_uzivatel::class,
            push_navrh_kategorie::class,
            push_navrh_kategorie_atribut::class,
            push_nabidka::class,
            push_nabidka_atribut::class,
        ]);
    }
}
