<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'cliente']);
        $role3 = Role::create(['name' => 'enfermera']);
        $role4 = Role::create(['name' => 'doctor']);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
