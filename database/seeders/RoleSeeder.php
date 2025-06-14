<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el rol si no existe
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buscar usuario y asignar rol
        $user = User::find(2);

        if ($user && !$user->hasRole('admin')) {
            $user->assignRole($adminRole);
        }

        // ######################## ADMIN ########################

        $admin = User::factory()->create([
            'name' => 'olivia',
            'email' => 'admin@admin.com',
            'password' => Hash::make('olivia123'),
        ]);
        
        $admin->assignRole('admin');
    }
}
