<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['color', 'plaque', 'year', 'brand', 'model', 'num_passenger'];
}
