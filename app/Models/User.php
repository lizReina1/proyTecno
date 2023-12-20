<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
         'ci',
         'name',
         'lastname',
         'birth_date',
         'celular',
         'tipo',
         'genero',
         'residencia_actual',
         'email',
         'password',
         'url_foto',
         'formacion',
         'sueldo',
         'ocupacion'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function medicos()
    {
        return self::where('tipo', 'M')->get();
    }
    public static function medicosServices($service_id)
    {
        return self::select('users.*')
                ->where('tipo', 'M')
                ->join('atencions', 'atencions.user_id', 'users.id')
                ->where('servicio_id', $service_id)
                ->where('estado', true)
                ->distinct()
                ->get();
    }
    public static function personal()
    {
        return self::whereIn('tipo', ['M', 'E'])->get();
    }
    public static function getPersonal()
    {
        return self::where(function ($query) {
            $query->where('tipo', 'E')
                  ->orWhere('tipo', 'M');
        })->get();
    }
}
