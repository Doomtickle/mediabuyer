<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuccessMetric extends Model
{
    protected $fillable = [
        'type',
        'description',
    ];    

    public function proposalRequest()
    {
        return $this->belongsTo(ProposalRequest::class);
    }

    public function media_plan()
    {
        return $this->belongsTo(MediaPlan::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    
}
