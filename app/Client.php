<?php

namespace App;

use App\ProposalRequest;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];


    public function mediaPlans()
    {
        return $this->hasMany('App\MediaPlan');
        
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proposalRequests()
    {
        return $this->hasMany(ProposalRequest::class);
    }

    public static function fromName($name)
    {
       $name = strtolower(str_replace('_', ' ', $name));

       return static::where(compact('name'))->with('mediaPlans.proposalRequests.proposals')->first();
 
    }

    public static function fromId($id)
    {
        return static::where(compact('id'))->first(); 
    }
    
    
    
}
