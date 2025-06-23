<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

// ImageFactory: genera imágenes fake con URL.
class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'url' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence(), // Si querés descripción random
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), // Asigna user_id válido
        ];
    }
}
