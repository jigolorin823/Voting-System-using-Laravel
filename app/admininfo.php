<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admininfo extends Model
{
    protected $guarded = [
        'id'
    ];
    public function user()
   {
       return $this->belongsTo(User::class);
   }
   public function region()
   {
       return $this->belongsTo(Region::class);
   }
}
