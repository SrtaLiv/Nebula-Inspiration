<?php

namespace Database\Factories;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

// FolderFactory: genera carpetas con nombres fake.
class FolderFactory extends Factory
{
    protected $model = Folder::class;

    public function definition(): array
    {
        return [
            'folder_name' => $this->faker->words(2, true),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
