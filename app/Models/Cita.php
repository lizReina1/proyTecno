<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $guarded = [''];

    static function createCita($fecha_cita, $estado_cita, $costo_cita, $paciente_id,$medico_id){
        return self::create([
            'fecha_cita' => $fecha_cita,
            'estado_cita' => $estado_cita,
            'costo_cita' => $costo_cita,
          
            'paciente_id' => $paciente_id,
            'medico_id' => $medico_id,
        ]);
    }
}
