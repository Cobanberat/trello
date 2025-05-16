<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    public function backgrounds()
    {
        return $this->hasOne(backgrounds::class, 'card_id', 'id')->whereNull('img');
    }
    public function backgroundsImg()
    {
        return $this->hasMany(backgrounds::class, 'card_id', 'id')->whereNotNull('img');
    }
    public function backgroundsImgType()
    {
        return $this->hasOne(backgrounds::class, 'card_id', 'id')->where('durum', 1)->whereNotNull('img');
    }
    public function tickets()
    {
        return $this->hasMany(ticket::class, 'card_id', 'id');
    }
}
