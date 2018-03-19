<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['nota', 'meeting_id', 'complaint', 'complaint_comment', 'check_quality'];
    protected $hidden = ['meeting_id'];

    public function Meeting(){
        return $this->belongsTo(Meeting::class);
    }
}
