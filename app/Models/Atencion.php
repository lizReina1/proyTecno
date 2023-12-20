<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function turno(){
        return $this->belongsTo(Turno::class);
    }
    static function getAtentionDoctorTurnService($doctor_id, $turn_id, $service_id)
    {
        return self::where('user_id', $doctor_id)
            ->where('servicio_id', $service_id)
            ->where('turno_id', $turn_id)
            ->where('estado', true)
            ->first();
    }
}
