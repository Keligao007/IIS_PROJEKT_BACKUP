<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObjednavkaAtribut extends Model
{
    use HasFactory;

    protected $table = 'objednavka_atribut';

    protected $fillable = [
        'id_objednavka',
        'id_atribut',
        'hodnota',
    ];

    // Vztah k Objednavka
    public function objednavka()
    {
        return $this->belongsTo(Objednavka::class, 'id_objednavka');
    }

    // Vztah k Atribut
    public function atribut()
    {
        return $this->belongsTo(Atribut::class, 'id_atribut');
    }

    public $timestamps = false;
}
