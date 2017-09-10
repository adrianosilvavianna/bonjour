<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'last_name', 'conntry', 'age', 'genre', 'phone_one', 'phone_two', 'photo_address'];
    protected $hidden = ['profileable_type', 'profileable_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
