<?php

namespace Database\Seeders;

use App\Models\NavrhKategorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_navrh_kategorie extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavrhKategorie::create([
            'meno' => 'banan',
            'parent_kategoria_id' => 2,
            'id_uzivatel' => 1,
        ]);

        NavrhKategorie::create([
            'meno' => 'pomeranc',
            'parent_kategoria_id' => 2,
            'id_uzivatel' => 1,
        ]);

        NavrhKategorie::create([
            'meno' => 'mrkev',
            'parent_kategoria_id' => 3,
            'id_uzivatel' => 2,
        ]);
    }
}
