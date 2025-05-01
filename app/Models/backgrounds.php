<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class backgrounds extends Model
{
    protected $fillable = [
        'img',
        'renk',
        'card_id',
        'type',
    ];
}
