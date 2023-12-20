<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    protected $guarded = [''];

    static function getAtentionDoctorTurnService($doctor_id, $turn_id, $service_id){
        return self::where('user_id', $doctor_id)
                    ->where('servicio_id', $service_id)
                    ->where('turno_id', $turn_id)
                    ->where('estado', true)
                    ->first();
    }
    static function getAtentions(){
        
    }
}
