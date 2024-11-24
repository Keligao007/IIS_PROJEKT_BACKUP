<?php

namespace Database\Seeders;

use App\Models\NavrhKategorieAtribut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_navrh_kategorie_atribut extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavrhKategorieAtribut::create([
            'id_navrh_kategorie' => 1,
            'id_atribut' => 2,
        ]);

        NavrhKategorieAtribut::create([
            'id_navrh_kategorie' => 1,
            'id_atribut' => 4,
        ]);

        NavrhKategorieAtribut::create([
            'id_navrh_kategorie' => 2,
            'id_atribut' => 1,
        ]);

        NavrhKategorieAtribut::create([
            'id_navrh_kategorie' => 2,
            'id_atribut' => 3,
        ]);

        NavrhKategorieAtribut::create([
            'id_navrh_kategorie' => 3,
            'id_atribut' => 1,
        ]);

        NavrhKategorieAtribut::create([
            'id_navrh_kategorie' => 3,
            'id_atribut' => 3,
        ]);
    }
}
