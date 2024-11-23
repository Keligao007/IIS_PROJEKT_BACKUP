<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NavrhKategorieAtribut extends Model
{
    use HasFactory;

    protected $table = 'navrh_kategorie_atribut';

    protected $fillable = [
        'id_navrh_kategorie',
        'id_atribut',
    ];

    // Vztah k NavrhKategorie
    public function navrhKategorie()
    {
        return $this->belongsTo(NavrhKategorie::class, 'id_navrh');
    }

    // Vztah k Atribut
    public function atribut()
    {
        return $this->belongsTo(Atribut::class, 'id_atribut');
    }

    public $timestamps = false;
}
