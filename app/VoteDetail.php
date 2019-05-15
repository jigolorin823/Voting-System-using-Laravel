<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteDetail extends Model
{
    protected $guarded = ['id'];

    public function electoral()
   {
       return $this->belongsTo(Electoral::class);
   }
    public function vote()
   {
       return $this->belongsTo(Vote::class);
   }
}
