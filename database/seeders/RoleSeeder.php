<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Crear rol si no existe
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        $user = User::where('email', 'olivia@example.com')->first();

        if ($user) {
            // Le asigno imagen solo si existe el usuario
            $user->images()->create([
                'url' => 'ruta/de/la/imagen.jpg'
            ]);
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
