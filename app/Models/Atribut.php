<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atribut extends Model
{
    use HasFactory;

    protected $table = 'atribut';

    protected $fillable = [
        'nazov',
    ];

    // Vztah k KategoriaplodinAtribut
    public function kategoriaPlodinAtribut()
    {
        return $this->hasMany(KategoriaPlodinAtribut::class, 'id_atribut');
    }

    // Vztah k NabidkaAtribut
    public function nabidkaAtribut()
    {
        return $this->hasMany(NabidkaAtribut::class, 'id_atribut');
    }

    // Vztah k NavrhKategorieAtribut
    public function navrh_kategorie_atribut()
    {
        return $this->hasMany(NavrhKategorieAtribut::class, 'id_atribut');
    }

    // Vztah k ObjednavkaAtribut
    public function objednavkaAtribut()
    {
        return $this->hasMany(ObjednavkaAtribut::class, 'id_atribut');
    }

    public function kategoria_plodin()
    {
        return $this->belongsToMany(KategoriaPlodin::class, 'kategoria_plodin_atribut', 'id_kategoria_plodin', 'id_atribut');
    }

    public $timestamps = false;
}
