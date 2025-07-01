<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            ImageFolderSeeder::class,
            TagSeeder::class,
        ]);

        // Image::factory(1)->create([
        //     // 'is_public' => true,
        //     'user_id' => 1
        // ]);

    }
}
