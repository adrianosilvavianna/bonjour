<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = ['color', 'plaque', 'year', 'brand', 'model', 'num_passenger'];

    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Trip(){
        return $this->hasMany(Trip::class);
    }
}
