<?php

namespace Database\Seeders;

use App\Models\Atribut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_atributes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atribut::create([
            'nazov' => 'cena/kg' // id 1
        ]);

        Atribut::create([
            'nazov' => 'cena/kus' // id 2
        ]);

        Atribut::create([
            'nazov' => 'mnozstvo/kg' // id 3
        ]);

        Atribut::create([
            'nazov' => 'mnozstvo/kus' // id 4
        ]);
    }
}
