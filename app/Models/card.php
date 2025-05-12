<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];
    
    public function backgrounds()
    {
        return $this->hasOne(backgrounds::class, 'card_id', 'id');
    }
    public function tickets()
    {
        return $this->hasMany(ticket::class, 'card_id', 'id');
    }
}