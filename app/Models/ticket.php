<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = [
        'renk',
        'card_id',
    ];

    protected $table = 'tickets';
}
