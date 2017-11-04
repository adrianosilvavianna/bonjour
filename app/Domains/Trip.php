<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
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

    public function searchMeeting()
    {
        foreach($this->Meetings as $meeting)
        {
            if($meeting->user_id == auth()->user()->id) {

                return true;

            }
        }
    }

}