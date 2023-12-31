<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'costo',
        'forma_compra',
        'atencion',
        'url_imagen'
    ];

    static function getServicesDoctor($doctor_id){
            return self::select('servicios.*', 'turnos.dia', 'turnos.hora_inicio', 'turnos.hora_fin')
                    ->join('atencions', 'atencions.servicio_id', 'servicios.id')
                    ->join('turnos', 'turnos.id', 'atencions.turno_id')
                    ->where('atencions.user_id', $doctor_id)
                    ->where('atencions.estado', true)
                    // ->distinct('servicios.id')
                    ->get();
    }
    public function atencions(){
        return $this->hasMany(Atencion::class);
    }

    public function ordens(){
        return $this->hasMany(Orden::class);
    }
}
