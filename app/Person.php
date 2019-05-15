<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id'];
    public function name()
   {
       return $this->belongsTo(Name::class);
   }
   public function barangay()
   {
       return $this->belongsTo(Barangay::class);
   }
   public function gender()
   {
       return $this->belongsTo(Gender::class);
   }
   public function civil_status()
   {
       return $this->belongsTo(CivilStatus::class);
   }
   public function candidate()
   {
       return $this->hasOne(Candidate::class);
   }

}
