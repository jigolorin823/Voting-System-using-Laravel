<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = ['id'];
    public function vdet()
   {
       return $this->hasMany(VoteDetail::class);
   }
   public function voter()
   {
       return $this->belongsTo(Voter::class);
   }
}
