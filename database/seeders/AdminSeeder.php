<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {

        // ######################## ADMIN ########################

        $admin = User::updateOrCreate([
            'name' => 'Olivia',
            'last_name' => 'Todesco',
            'username' => 'olivia123',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'age' => 20,
        ]);

        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }
    }
}
