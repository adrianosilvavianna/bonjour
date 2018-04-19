<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['nota', 'trip_id', 'complaint', 'complaint_comment', 'check_quality', 'user_to', 'user_from'];
    protected $hidden = ['trip_id', 'user_id'];

    public function Trip(){
        return $this->belongsTo(Trip::class);
    }

    public function UserTo(){
        return $this->belongsTo(User::class, 'user_to');
    }

    public function UserFrom(){
        return $this->belongsTo(User::class, 'user_from');
    }
}
