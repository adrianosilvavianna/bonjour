<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['txtEndereco', 'txtLatitude', 'txtLongitude', 'name'];

    protected $hidden = ['locationable_type', 'locationable_id'];

    public function locationable()
    {
        return $this->morphTo();
    }
}