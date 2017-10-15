<?php

namespace App;

use App\Domains\Location;
use App\Domains\Phone;
use App\Domains\Profile;
use App\Domains\Trip;
use App\Domains\Vehicle;
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

    public function User()
    {
        return $this->hasOne(User::class);
    }

    public function Profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function Phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function Location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function Vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function Trips(){
        return $this->hasMany(Trip::class);
    }
}
