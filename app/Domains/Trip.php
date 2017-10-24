<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['exit_address', 'arrival_address', 'date', 'time', 'vehicle_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

}



