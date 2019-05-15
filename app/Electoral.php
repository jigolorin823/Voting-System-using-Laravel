<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electoral extends Model
{
    protected $guarded = ['id'];

    public function candidate()
   {
       return $this->belongsTo(Candidate::class);
   }
   public function position()
   {
       return $this->belongsTo(Position::class);
   }
   public function partylist()
   {
       return $this->belongsTo(Partylist::class);
   }
   public function year()
   {
       return $this->belongsTo(year::class);
   }
   public function votes()
   {
       return $this->hasMany(VoteDetail::class);
   }
   public function votesCountRelation()
    {
        return $this->hasMany(VoteDetail::class)->selectRaw('electoral_id, count(*) as count')->groupBy('electoral_id')->orderBy('electoral_id');
    }
    public function getVotesCountAttribute()
    {
        return $this->votesCountRelation->first()?$this->votesCountRelation->first()->count:0;
    }

   
}
