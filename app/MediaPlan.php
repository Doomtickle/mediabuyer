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


}
