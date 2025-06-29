<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos 10 imagenes
        if (Image::count() === 0) {
            Image::factory()->count(10)->create();
        }

        Folder::factory()
            ->count(5)
            ->create()
            ->each(function ($folder) {
                // Asociamos entre 2 y 5 imágenes aleatorias
                $imageIds = Image::inRandomOrder()->limit(rand(2, 5))->pluck('id');
                $folder->images()->attach($imageIds);
            });
    }
}
