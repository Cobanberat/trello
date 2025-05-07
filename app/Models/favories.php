<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class favories extends Model
{
    protected $fillable = [
        'pano_id',
        'user_id',
    ];

    public function favori()
    {
        return $this->hasOne(pano::class, 'id', 'pano_id')
        ->where('user_id', Auth::id());
    }
}
