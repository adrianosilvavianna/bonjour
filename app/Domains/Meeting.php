<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['trip_id', 'user_id'];

    public function User(){
        return  $this->belongsTo(User::class);
    }

    public function Trip(){
        return  $this->belongsTo(Trip::class);
    }
}
