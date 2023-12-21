<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'cliente']);
        $role3 = Role::create(['name' => 'enfermera']);
        $role4 = Role::create(['name' => 'doctor']);
    }
}
