<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['exit_address', 'arrival_address', 'date', 'time'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}



