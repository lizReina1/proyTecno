<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $guarded = [''];

    static function getTurnOfServicedDoctor($servicioId, $doctor_id, $dayOfWeekName){
        return self::select('turnos.*')
                ->join('atencions', 'atencions.turno_id', 'turnos.id')
                ->where('atencions.user_id', $doctor_id)
                ->where('atencions.servicio_id', $servicioId)
                ->where('turnos.dia', $dayOfWeekName)
                ->distinct()
                ->get();
    }
}
