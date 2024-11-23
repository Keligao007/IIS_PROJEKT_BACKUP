<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriaPlodin extends Model
{
    use HasFactory;

    protected $table = 'kategoria_plodin';

    protected $fillable = [
        'meno',
        'parent_kategoria_id',
    ];

    // Vztah k nadradenej kategórii (parent)
    public function parentCategory()
    {
        return $this->belongsTo(KategoriaPlodin::class, 'parent_kategoria_id');
    }

    // Vztah k podkategóriám (children)
    public function childCategories()
    {
        return $this->hasMany(KategoriaPlodin::class, 'parent_kategoria_id');
    }

    // Vztah k KategoriaPlodinAtribut
    public function kategoriaPlodinAtribut()
    {
        return $this->hasMany(KategoriaPlodinAtribut::class, 'id_kategoria_plodin');
    }

    // Vztah k Nabidka
    public function nabidka()
    {
        return $this->hasMany(Nabidka::class, 'id_kategoria_plodin');
    }

    public function atributy()
    {
        return $this->belongsToMany(Atribut::class, 'kategoria_plodin_atribut', 'id_kategoria_plodin', 'id_atribut');
    }

    public $timestamps = true;
}
