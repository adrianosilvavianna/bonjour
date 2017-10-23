<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class VehicleTrip extends Model
{
    protected $fillable = ['trip_id', 'vechicle_id'];
}
