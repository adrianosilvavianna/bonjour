<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['nota', 'comment', 'user_id'];

    public function evaluationable()
    {
        return $this->morphTo();
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
