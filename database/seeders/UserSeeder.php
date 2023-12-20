<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'ci' => '9821736',
            'name' => 'Christian',
            'lastname' => 'Mamani',
            'birth_date' => '2023-12-16',
            'celular' => 78372872,
            'tipo' => 'A',
            'genero' => 'M',
            'residencia_actual' => 'Santa Cruz',
            'email' => 'christian@gmail.com',
            'password' => bcrypt('12345678'),
            'url_foto' => 'url.png',
        ]);

        $users = [
            //MEDICOS Y ENFERMERAS
            [
                'ci'=>'8932929',
                'name'=>'Shesly Dayana',
                'lastname'=>'Mamani Soliz',
                'birth_date'=>'1996-11-18',
                'celular'=>7623763,
                'tipo'=>'M',
                'genero'=>'F',
                'residencia_actual'=>'Plan 3000',
                'email'=>'shesly@gmail.com',
                'password'=>bcrypt('12345678'),
                'url_foto'=>'foto.png',
                'formacion'=>'UAGRM',
                'sueldo'=>5000,
            ]
        ];

        User::create([
            'ci' => '3333333',
            'name' => 'liz',
            'lastname' => 'Reina',
            'birth_date' => '2023-12-16',
            'celular' => 78372872,
            'tipo' => 'E',
            'genero' => 'M',
            'residencia_actual' => 'Santa Cruz',
            'email' => 'liz@gmail.com',
            'password' => bcrypt('12345678'),
            'url_foto' => 'url.png',
        ]);
    }
}
