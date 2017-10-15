<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['color', 'plaque', 'year', 'brand', 'model', 'num_passenger'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
