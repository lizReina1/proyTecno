<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orden extends Model
{
    use HasFactory;
    protected $fillable = [
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

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
    static function getNumberOrden()
    {
        // $ultima_orden = self::latest()->first()->id;
        $nombreSecuencia = 'ordens_id_seq';

        // Ejecutar la consulta SQL para obtener el próximo valor de la secuencia
        $resultado = DB::select("SELECT nextval('$nombreSecuencia') AS siguiente_valor");
        // Obtener el siguiente valor de la secuencia desde el resultado
        $siguienteValor = $resultado[0]->siguiente_valor;
        return $siguienteValor + 1;
    }
}
