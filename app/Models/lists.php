<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lists extends Model
{
    protected $table = 'lists';
   protected $fillable = [
    'name',
    'pano_id',
   ];
   public function cards()
{
    return $this->hasMany(card::class);
}
}
