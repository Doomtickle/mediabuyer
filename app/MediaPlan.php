<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;

class MediaPlan extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');

    }

    public function proposalRequests()
    {
        return $this->hasMany(ProposalRequest::class);
    }

    public function successMetrics()
    {
        return $this->hasMany(SuccessMetric::class);
    }
    

    public static function fromTitle($title)
    {
        $title = strtolower(str_replace('_', ' ', $title));
        return static::where(compact('title'))->with('client')->first();

    }

}
