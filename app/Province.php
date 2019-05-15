<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded = [
        'id'
    ];
    public function region()
   {
       return $this->belongsTo(Region::class);
   }
}
