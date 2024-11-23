<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class RegistrovanyUzivatel extends Authenticatable
{
    use HasFactory;

    protected $table = 'registrovany_uzivatel';

    protected $fillable = [
        'login',
        'password',
        'type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getAuthIdentifierName()
    {
        return 'login';
    }

    

}
