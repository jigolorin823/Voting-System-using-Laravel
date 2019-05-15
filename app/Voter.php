<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $guarded = ['id'];
    public function user()
   {
       return $this->belongsTo(User::class);
   }
   public function person()
   {
       return $this->belongsTo(Person::class);
   }
   public function cand()
   {
       return $this->hasOne(Candidate::class);
   }
}
