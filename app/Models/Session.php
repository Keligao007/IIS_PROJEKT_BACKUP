<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    // Určte názov tabuľky, ak sa nezhoduje s predvoleným názvom
    protected $table = 'sessions';

    // Zakážte timestamps, ak ich tabuľka nemá
    public $timestamps = false;

    // Určte, ktoré stĺpce môžu byť hromadne priradené
    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];
}
