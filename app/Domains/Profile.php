<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'phone', 'photo_address', 'about'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function MoreInformation(){
        return $this->hasOne(MoreInformation::class);
    }
}
