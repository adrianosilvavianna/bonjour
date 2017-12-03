<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['lang_e'];

    public function User(){
        return  $this->belongsTo(User::class);
    }
}
