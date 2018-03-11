<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['nota', 'comment', 'trip_id', 'user_id'];
    protected $hidden = ['trip_id', 'user_id'];


    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Trip(){
        return $this->belongsTo(Trip::class);
    }
}
