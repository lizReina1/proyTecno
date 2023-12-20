<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        // $ultima_orden = self::latest()->first()->id;
        $nombreSecuencia = 'ordens_id_seq';

        // Ejecutar la consulta SQL para obtener el próximo valor de la secuencia
        $resultado = DB::select("SELECT nextval('$nombreSecuencia') AS siguiente_valor");
        // Obtener el siguiente valor de la secuencia desde el resultado
        $siguienteValor = $resultado[0]->siguiente_valor;
        return $siguienteValor + 1;
    }
    // obtiene ordenes y paciente de un doctor
    static function getOrdensForDoctorId($doctor_id){
        $ordens = self::select('ordens.*', 'fichas.hora_fin_atencion', 'fichas.hora_inicio_atencion')//, 'users.name', 'users.lastname', 'users.email', 'users.ci', 'users.url_foto')
                        ->selectRaw('(SELECT name FROM users WHERE id = ordens.paciente_id) AS name')
                        ->selectRaw('(SELECT lastname FROM users WHERE id = ordens.paciente_id) AS lastname')
                        ->selectRaw('(SELECT email FROM users WHERE id = ordens.paciente_id) AS email')
                        ->selectRaw('(SELECT url_foto FROM users WHERE id = ordens.paciente_id) AS url_foto')
                        ->selectRaw('(SELECT ci FROM users WHERE id = ordens.paciente_id) AS ci')
                        ->join('fichas', 'fichas.id', 'ordens.ficha_id')
                        ->join('atencions', 'atencions.id', 'fichas.atencion_id') 
                        ->join('users', 'users.id', 'atencions.user_id') 
                        ->where('users.tipo', 'M') 
                        ->where('users.id', $doctor_id) 
                        ->orderBy('ordens.fecha_atencion', 'asc')
                        ->get();
        return $ordens;
    }

}
