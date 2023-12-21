<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoMedico extends Model
{
    use HasFactory;
    protected $guarded = [''];

    static function getDatoMedicoOfHistorial($historial_id){
        return self::where('historial_id', $historial_id)
                    ->get();
    }

}
