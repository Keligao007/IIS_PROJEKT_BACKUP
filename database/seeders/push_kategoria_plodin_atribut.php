<?php

namespace Database\Seeders;

use App\Models\KategoriaPlodinAtribut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_kategoria_plodin_atribut extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 4,
            'id_atribut' => 1,
        ]);

        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 4,
            'id_atribut' => 3,
        ]);

        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 5,
            'id_atribut' => 2,
        ]);

        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 5,
            'id_atribut' => 4,
        ]);

        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 6,
            'id_atribut' => 1,
        ]);

        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 6,
            'id_atribut' => 3,
        ]);

        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 7,
            'id_atribut' => 2,
        ]);

        KategoriaPlodinAtribut::create([
            'id_kategoria_plodin' => 7,
            'id_atribut' => 4,
        ]);
    }
}
