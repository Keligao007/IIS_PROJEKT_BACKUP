<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NavrhKategorie extends Model
{
    use HasFactory;

    protected $table = 'navrh_kategorie';

    protected $fillable = [
        'meno',
        'parent_kategoria_id',
        'id_uzivatel',
    ];

    // Vztah k nadradenej kategórii
    public function parentCategory()
    {
        return $this->belongsTo(KategoriaPlodin::class, 'parent_kategoria_id');
    }

    // Vztah k NavrhKategorieAtribut
    public function navrhKategorieAtribut()
    {
        return $this->hasMany(NavrhKategorieAtribut::class, 'id_navrh_kategorie');
    }

    public function atributy()
    {
        return $this->hasMany(NavrhKategorieAtribut::class, 'id_navrh_kategorie');
    }

    public function parent_kategoria()
    {
        return $this->belongsTo(KategoriaPlodin::class, 'parent_kategoria_id');
    }

    public $timestamps = true;
}
