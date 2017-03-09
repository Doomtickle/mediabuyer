<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
    protected $fillable = [

        'first_name',
        'last_name',
        'title',
        'email',
        'phone'

    ];

    /**
     * A client contact belongs to a client
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
   }
}
