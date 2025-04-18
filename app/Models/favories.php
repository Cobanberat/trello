<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favories extends Model
{
    protected $fillable = [
        'name',
        'pano_id',
    ];

    public function favori()
    {
        return $this->hasOne(pano::class, 'id', 'pano_id');
    }
}
