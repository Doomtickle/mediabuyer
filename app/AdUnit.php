<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdUnit extends Model
{
    protected $fillable = [
        'size',
        'type',
        'description',
    ];

    public function proposalRequest()
    {
       return $this->belongsTo(ProposalRequest::class);
        
    }
    

}
