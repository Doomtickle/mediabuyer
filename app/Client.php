<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];


    public function mediaPlans()
    {
        return $this->hasMany('App\MediaPlan');
        
    }

    public static function fromName($name)
    {
       $name = strtolower(str_replace('_', ' ', $name));

       return static::where(compact('name'))->first();
 
    }

    public static function fromId($id)
    {
        return static::where(compact('id'))->first(); 
    }
    
    
    
}
