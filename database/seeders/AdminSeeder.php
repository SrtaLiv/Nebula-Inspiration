<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurarse de que el rol admin exista
        Role::firstOrCreate(['name' => 'admin']);

        // Instancio un user administrador
        $admin = User::create([
            'name' => 'Olivia',
            'email' => 'olivia@example.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}
