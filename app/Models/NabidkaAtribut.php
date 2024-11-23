<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NabidkaAtribut extends Model
{
    use HasFactory;

    protected $table = 'nabidka_atribut';

    protected $fillable = [
        'id_nabidka', // id ku ktorej nabidke sa viaze
        'id_atribut', // id atributu
        'hodnota', // hodnota daneho atributu (id_atribut)
    ];

    // Vztah k Nabidka
    public function nabidka()
    {
        return $this->belongsTo(Nabidka::class, 'id_nabidka');
    }

    // Vztah k Atribut
    public function atribut()
    {
        return $this->belongsTo(Atribut::class, 'id_atribut');
    }

    public $timestamps = false;
}
