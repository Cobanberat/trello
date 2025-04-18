<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class pano extends Model
{
    protected $guarded = [];
    public function lists()
{
    return $this->hasMany(Lists::class);
}
}
