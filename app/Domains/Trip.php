<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Trip extends Model
{

    use Notifiable;

    protected $fillable = ['exit_address', 'arrival_address', 'date', 'time', 'vehicle_id', 'num_passenger'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function Meetings()
    {
        return $this->hasMany(Meeting::class);
    }

}



