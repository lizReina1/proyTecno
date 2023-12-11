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
}
