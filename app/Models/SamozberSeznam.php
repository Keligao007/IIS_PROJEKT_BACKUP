<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SamozberSeznam extends Model
{
    use HasFactory;

    protected $table = 'samozber_seznam';

    // sluzi na ukladanie toho, ktory uzivatel si zaskrkol ktoreho samozberu sa ucastni

    protected $fillable = [
        'id_samozber', // id samozberu, ktoreho sa chce uzivatel zucastnit
        'id_uzivatel', // ten co sa chce zucastnit, co sakrkol moznost ucasti
    ];

    // Vztah k Samozberu
    public function samozber()
    {
        return $this->belongsTo(Samozber::class, 'id_samozber');
    }

    // Vztah k User
    public function uzivatel()
    {
        return $this->belongsTo(RegistrovanyUzivatel::class, 'id_uzivatel');
    }

    public $timestamps = true;
}
