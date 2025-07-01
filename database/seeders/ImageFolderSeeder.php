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

        Folder::factory()
            ->count(5)
            ->create()
            ->each(function ($folder) {
                // Asociamos entre 2 y 5 imágenes aleatorias
                $imageIds = Image::inRandomOrder()->limit(rand(1, 3))->pluck('id');
                $folder->images()->attach($imageIds);
            });
    }
}
