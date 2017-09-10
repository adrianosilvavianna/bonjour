<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'last_name', 'age', 'gender', 'photo_address'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
