<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Samozber;
use App\Models\Nabidka;
use App\Models\RegistrovanyUzivatel;

class push_samozbery extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Samozber::create([
            'miesto' => 'Miesto 1',
            'datum_a_cas' => '2023-12-01 10:00:00',
            'id_nabidka' => 1,
            'id_uzivatel' => 3,
        ]);

        Samozber::create([
            'miesto' => 'Miesto 2',
            'datum_a_cas' => '2023-12-02 11:00:00',
            'id_nabidka' => 2,
            'id_uzivatel' => 4,
        ]);

        Samozber::create([
            'miesto' => 'Miesto 3',
            'datum_a_cas' => '2023-12-02 16:00:00',
            'id_nabidka' => 3,
            'id_uzivatel' => 3,
        ]);

        Samozber::create([
            'miesto' => 'Miesto 4',
            'datum_a_cas' => '2023-12-02 19:00:00',
            'id_nabidka' => 4,
            'id_uzivatel' => 4,
        ]);
    }
}