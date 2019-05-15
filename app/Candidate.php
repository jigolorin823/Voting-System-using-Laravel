<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $guarded = ['id'];
    public function person()
   {
       return $this->belongsTo(Person::class);
   }
    public function electoral()
   {
       return $this->hasMany(Electoral::class);
   }
}
