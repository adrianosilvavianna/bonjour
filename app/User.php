<?php

namespace App;

use App\Domains\Config;
use App\Domains\Evaluation;
use App\Domains\Location;
use App\Domains\Meeting;
use App\Domains\Profile;
use App\Domains\Report;
use App\Domains\Trip;
use App\Domains\Vehicle;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Profile(){
        return $this->hasOne(Profile::class);
    }

    public function Location(){
        return $this->morphOne(Location::class, 'locationable');
    }

    public function Vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public function Trips(){
        return $this->hasMany(Trip::class);
    }

    public function Meetings(){
        return $this->hasMany(Meeting::class);
    }

    public function Evaluations(){
        return $this->hasMany(Evaluation::class, 'user_to');
    }

    public function Reports(){
        return $this->morphMany(Report::class, 'reportable');
    }

    public function Config()
    {
        return $this->hasOne(Config::class);
    }

    public function ratingEvaluation(){
        $evaluations = $this->Evaluations;
        $nota = 0;
        foreach($evaluations as $evaluation){
            $nota =+ $evaluation->nota;
        }
        $media = $nota/$evaluations->count();
        return $media;
    }
}
