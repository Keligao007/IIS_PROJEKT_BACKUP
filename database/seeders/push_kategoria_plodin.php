<?php

namespace Database\Seeders;

use App\Models\KategoriaPlodin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_kategoria_plodin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriaPlodin::create([
            // id 1
            'meno' => 'plodina',
            'parent_kategoria_id' => null, // hlavna kategoria
        ]);

        KategoriaPlodin::create([
            // id 2
            'meno' => 'ovocie',
            'parent_kategoria_id' => 1, // ovocie kategoria
        ]);

        KategoriaPlodin::create([
            // id 3
            'meno' => 'zelenina',
            'parent_kategoria_id' => 1, // zelenina kategoria
        ]);

        KategoriaPlodin::create([
            // id 4
            'meno' => 'jablko',
            'parent_kategoria_id' => 2, // patri do ovocia
        ]);

        KategoriaPlodin::create([
            // id 5
            'meno' => 'melon',
            'parent_kategoria_id' => 2, // patri do ovocia
        ]);

        KategoriaPlodin::create([
            // id 6
            'meno' => 'rajce',
            'parent_kategoria_id' => 3, // patri do zeleniny
        ]);

        KategoriaPlodin::create([
            // id 7
            'meno' => 'uhorka',
            'parent_kategoria_id' => 3, // patri do zeleniny
        ]);
    }
}
