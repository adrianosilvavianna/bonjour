<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone'];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
