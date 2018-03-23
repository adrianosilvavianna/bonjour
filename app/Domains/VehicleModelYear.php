<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleModelYear extends Model
{
    protected $table = 'VehicleModelYear';

    static function getMarcas(){
       return DB::table('VehicleModelYear')->select('make')->distinct()->get();
    }

    static function getModels($make){
        return DB::table('VehicleModelYear')->select('model')->where('make', $make)->distinct()->get();
    }

    static function getYear($model){
        return DB::table('VehicleModelYear')->select('year')->where('model', $model )->distinct()->get();
    }
}
