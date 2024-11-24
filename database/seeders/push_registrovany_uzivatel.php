<?php

namespace Database\Seeders;

use App\Models\RegistrovanyUzivatel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class push_registrovany_uzivatel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegistrovanyUzivatel::create([
            'login' => 'admin',
            'password' => 'ADMIN123',
            'type' => 'admin',
        ]);
        
        RegistrovanyUzivatel::create([
            'login' => 'moderator',
            'password' => 'MODERATOR123',
            'type' => 'moderator',
        ]);

        RegistrovanyUzivatel::create([
            'login' => 'pouzivatel1',
            'password' => 'user123',
            'type' => 'regular',
        ]);

        RegistrovanyUzivatel::create([
            'login' => 'pouzivatel2',
            'password' => 'user123',
            'type' => 'regular',
        ]);
    }
}
