<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetProposal extends Model
{
    protected $table = 'budget_proposals';
    protected $fillable = [
        'client_id',
        'media_plan_id',
        'market',
        'broadcast_radio',
        'broadcast_cable_tv',
        'digital_tv_hulu',
        'digital_radio_pandora',
        'digital_radio_spotify',
        'digital_radio_iheart',
        'digital_geofencing',
        'digital_google_text_and_display',
        'digital_youtube_and_google_video',
        'market_split',
    ];

    public function mediaPlan()
    {

        return $this->belongsTo(MediaPlan::class, 'media_plan_id');
    }

    public function client()
    {

        return $this->belongsTo(Client::class, 'client_id');
    }
    
    
}
