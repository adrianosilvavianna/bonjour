<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['exit_address', 'arrival_address', 'date', 'time'];
}



