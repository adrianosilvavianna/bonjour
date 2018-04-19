<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'last_name', 'age', 'gender', 'phone', 'photo_address', 'about'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getGender()
    {
        $this->gender == 0 ? $gender = "Feminino" : $gender = "Masculino";
        return $gender;
    }

    public function percentage(){
        $evaluations = $this->User->Evaluations;
        $count = $evaluations->count();
        if($count > 0){
            $some = 0;
            foreach($evaluations as $evaluation){
                $some += $evaluation->nota;
            }
            return percentage($some/$count);
        }
        return 0;
    }
}
