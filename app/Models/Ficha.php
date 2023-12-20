<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    protected $guarded = [''];

    static function getFichaDoctorServiceTurnDate($doctor_id, $service_id, $turn_id, $date){
        $ficha = self::select('fichas.*')
                    ->join('atencions', 'atencions.id', 'fichas.atencion_id')
                    ->where('atencions.user_id', $doctor_id)
                    ->where('atencions.servicio_id', $service_id)
                    ->where('atencions.turno_id', $turn_id)
                    ->whereDate('fichas.fecha', $date)
                    ->get();
        return $ficha;
    }
    static function getFichaAtentionDate($atention_id, $date){
        return self::
                    where('atencion_id', $atention_id)
                    ->whereDate('fichas.fecha', $date)
                    ->first();
    }
    static function createFicha($date, $turn, $atencion_id, $costo){
        return self::create([
            'fecha' => $date,
            'cantidad_ficha' => 20,
            'restante_ficha' => 20,
            'hora_inicio_atencion' => $turn->hora_inicio,
            'hora_fin_atencion' => $turn->hora_inicio,
            'costo' => $costo,
            'atencion_id' => $atencion_id,
        ]);
    }
}
