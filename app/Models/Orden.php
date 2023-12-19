<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $fillable=[
        'servicio',
        'medico',
        'costo',
        'direccion_consultorio',
        'fecha_atencion',
        'fecha_emision',
        'forma_pago',
        'pagado',
        'fecha_pago',
        'ficha_id',
        'paciente_id',
        'servicio_id',
        'costo_servicio',
        'descuento',
        'nit',
        'razon_social',
        'email',
        'celular',
    ];

    static function getNumberOrden(){
        $ultima_orden = self::latest()->first()->id;
        return $ultima_orden + 1;
    }


}
