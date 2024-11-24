<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nabidka extends Model
{
    use HasFactory;

    protected $table = 'nabidka';

    protected $fillable = [
        'meno', // meno nabidky
        'id_kategoria_plodin', // id ku ktorej kategori sa nabidka viaze
        'id_uzivatel', // uzivatel ktory ju vytvoril
    ];

    // Vztah k Kategoria_plodin
    public function kategoria()
    {
        return $this->belongsTo(KategoriaPlodin::class, 'id_kategoria_plodin');
    }

    // Vztah k NabidkaAtribut
    public function nabidka_atribut()
    {
        return $this->hasMany(NabidkaAtribut::class, 'id_nabidka');
    }

    // Vztah k Objednavka
    public function objednavka()
    {
        return $this->hasMany(Objednavka::class, 'id_nabidka');
    }

    public function atributy()
    {
        return $this->hasMany(NabidkaAtribut::class, 'id_nabidka');
    }

    public $timestamps = true;
}
