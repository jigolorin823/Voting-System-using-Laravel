<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class year extends Model
{
    protected $guarded = ['id'];
    public function elect()
   {
       return $this->hasMany(Electoral::class);
   }
}
