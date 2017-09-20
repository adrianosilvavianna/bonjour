<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'last_name', 'age', 'gender', 'photo_address', 'about'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getGender()
    {
        $this->gender == 0 ? $gender = "Masculino" : $gender = "Feminino";
        return $gender;
    }
}
