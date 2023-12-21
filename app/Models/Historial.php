<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $guarded = [''];

    static function getHistorialPacienteId($array_paciente_id){
        return self::select('historials.*', 'users.name', 'users.lastname', 'users.ci', 'users.email', 'users.url_foto', 'users.celular', 'users.genero')
                    ->join('users', 'users.id', 'historials.paciente_id')
                    ->whereIn('historials.paciente_id', $array_paciente_id)
                    ->get();
    }
}
