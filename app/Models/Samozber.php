<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Samozber extends Model
{
    use HasFactory;

    protected $table = 'samozber';

    protected $fillable = [
        'miesto',
        'datum_a_cas',
        'id_nabidka', // id nabidky, ktorej sa to kona
        'id_uzivatel', // ten co ho organizuje
    ];

    // Vztah k modelu Nabidka
    public function nabidka()
    {
        return $this->belongsTo(Nabidka::class, 'id_nabidka');
    }

    // Vztah k modelu User
    public function farmar()
    {
        return $this->belongsTo(RegistrovanyUzivatel::class, 'id_uzivatel');
    }

    // Vztah k SamozberSeznam
    public function ucastnici()
    {
        return $this->hasMany(SamozberSeznam::class, 'id_samozber');
    }

    public $timestamps = true;
}
