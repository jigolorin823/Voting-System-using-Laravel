<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $guarded = [
        'id'
    ];
    public function city()
   {
       return $this->belongsTo(City::class);
   }
}
