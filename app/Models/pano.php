<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pano extends Model
{
    protected $guarded = [];
    public function lists()
    {
        return $this->hasMany(Lists::class);
    }
    public function favories()
    {
        return $this->hasMany(favories::class);
    }
    public function favori()
    {
        return $this->hasOne(favories::class, 'pano_id', 'id');
    }
}
