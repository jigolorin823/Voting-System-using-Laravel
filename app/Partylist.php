<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partylist extends Model
{
    protected $guarded = ['id'];

    public function electoral()
   {
       return $this->hasMany(Electoral::class);
   }
}
