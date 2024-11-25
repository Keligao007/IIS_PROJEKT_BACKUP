<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Objednavka extends Model
{
    use HasFactory;

    protected $table = 'objednavka';

    protected $fillable = [
        'id_nabidka',
        'id_uzivatel',
        'suma',
    ];

    // Vztah k Nabidka
    public function nabidka()
    {
        return $this->belongsTo(Nabidka::class, 'id_nabidka');
    }

    // Vztah k ObjednavkaAtribut
    public function objednavkaAtribut()
    {
        return $this->hasMany(ObjednavkaAtribut::class, 'id_objednavka');
    }

    public $timestamps = true;
}
