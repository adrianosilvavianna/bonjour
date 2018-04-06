<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['address','number','city','zip_code','district','state_abbr','complement'];

    public function MoreInformation(){
        return $this->belongsTo(MoreInformation::class);
    }

}