<?php

namespace Database\Seeders;

use App\Models\NabidkaAtribut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_nabidka_atribut extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // -------uzivatel1

        NabidkaAtribut::create([
            'id_nabidka' => 1, // nabidka jablko
            'id_atribut' => 1, // atribut cena/kg
            'hodnota' => '2',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 1, // nabidka jablko
            'id_atribut' => 3, // atribut mnozstvo/kg
            'hodnota' => '50',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 2, // nabidka melon
            'id_atribut' => 2, // atribut cena/kus
            'hodnota' => '4',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 2, // nabidka melon
            'id_atribut' => 4, // atribut mnozstvo/kus
            'hodnota' => '10',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 3, // nabidka rajce
            'id_atribut' => 1, // atribut cena/kg
            'hodnota' => '3',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 3, // nabidka rajce
            'id_atribut' => 3, // atribut mnozstvo/kg
            'hodnota' => '30',
        ]);

        // -------uzivatel2

        NabidkaAtribut::create([
            'id_nabidka' => 4, // nabidka uhorka
            'id_atribut' => 2, // atribut cena/kus
            'hodnota' => '1',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 4, // nabidka uhorka
            'id_atribut' => 4, // atribut mnozstvo/kus
            'hodnota' => '20',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 5, // nabidka melon
            'id_atribut' => 2, // atribut cena/kus
            'hodnota' => '3',
        ]);

        NabidkaAtribut::create([
            'id_nabidka' => 5, // nabidka melon
            'id_atribut' => 4, // atribut mnozstvo/kus
            'hodnota' => '30',
        ]);
    }
}
