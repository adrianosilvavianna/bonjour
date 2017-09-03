<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
