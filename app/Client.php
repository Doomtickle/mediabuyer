<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public static function fromName($name)
    {
       $name = strtolower(str_replace('_', ' ', $name));

       return static::where(compact('name'))->first();
 
    }
    
}
