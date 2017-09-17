<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['address', 'latitude', 'longitude'];

    protected $hidden = ['locationable_type', 'locationable_id'];

    public function locationable()
    {
        return $this->morphTo();
    }
}