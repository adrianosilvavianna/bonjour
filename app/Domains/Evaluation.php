<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['nota', 'meeting_id', 'complaint', 'complaint_comment', 'check_quality', 'user_id'];
    protected $hidden = ['meeting_id', 'user_id'];

    public function Meeting(){
        return $this->belongsTo(Meeting::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
