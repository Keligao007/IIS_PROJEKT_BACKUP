<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriaPlodinAtribut extends Model
{
    use HasFactory;

    protected $table = 'kategoria_plodin_atribut';

    protected $fillable = [
        'id_kategoria_plodin',
        'id_atribut',
    ];

    // Vztah k KategoriaPlodin
    public function kategoriaPlodin()
    {
        return $this->belongsTo(KategoriaPlodin::class, 'id_kategoria_plodin');
    }

    // Vztah k Atribut
    public function atribut()
    {
        return $this->belongsTo(Atribut::class, 'id_atribut');
    }

    public $timestamps = false;
}
