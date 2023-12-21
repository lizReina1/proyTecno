<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $guarded = [''];

    static function getcitasForDoctorId($doctor_id){
        return self::select('citas.*', 'users.name', 'users.lastname', 'users.ci', 'users.email', 'users.url_foto')
                ->join('users', 'users.id', 'citas.paciente_id')
                ->where('medico_id', $doctor_id)
                ->get();
    }
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
