<?php

namespace Database\Seeders;

use App\Models\Nabidka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_nabidka extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ------- uzivatel1
        Nabidka::create([
            'meno' => 'Golden Jablko',
            'id_kategoria_plodin' => 4, // jablko
            'id_uzivatel' => 3, // pouzivatel1
        ]);

        Nabidka::create([
            'meno' => 'Exotic Melon',
            'id_kategoria_plodin' => 5, // melon
            'id_uzivatel' => 3, // pouzivatel1
        ]);

        Nabidka::create([
            'meno' => 'Rajce Tomino',
            'id_kategoria_plodin' => 6, // rajce
            'id_uzivatel' => 3, // pouzivatel1
        ]);

        // ------- uzivatel2

        Nabidka::create([
            'meno' => 'Uhorka jak Lusk',
            'id_kategoria_plodin' => 7, // uhorka
            'id_uzivatel' => 4, // pouzivatel2
        ]);

        Nabidka::create([
            'meno' => 'Melon vodny',
            'id_kategoria_plodin' => 5, // melon
            'id_uzivatel' => 4, // pouzivatel2
        ]);
    }
}
