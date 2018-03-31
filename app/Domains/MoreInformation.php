<?php

namespace App\Domains;

use App\Domains\Profile;
use Illuminate\Database\Eloquent\Model;

class MoreInformation extends Model
{
    protected $fillable = ['country_birth', 'date_birth', 'cpf', 'passport', 'foreign', 'smoker', 'have_dog', 'confidence_phone'];

    public function Profile(){
        return  $this->belongsTo(Profile::class);
    }

    public function Location(){
        return $this->hasOne(Location::class);
    }

}
