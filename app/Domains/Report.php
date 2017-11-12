<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function reportable(){
        return $this->morphTo();
    }

    public function Users(){
        return $this->belongsTo(User::class, 'reportable');
    }
}
