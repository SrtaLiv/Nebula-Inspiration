<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tag as ModelsTag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $image1 = Image::create(
            [
                'url' => "https://cdn.dribbble.com/userupload/42908115/file/still-b2e4b41d16e01308d96c12824b5854e1.png?format=webp&resize=1200x900&vertical=center",
                'description' => "Foto de una casa minimalista",
                'user_id' => 1,
            ]
        );


        $image2 = Image::create(
            [
                'url' => "https://cdn.dribbble.com/userupload/19156658/file/original-1c4d8503f7b04fa985eb016e4c5c9874.jpg?format=webp&resize=320x240&vertical=center",
                'description' => "Foto de una casa minimalista",
                'user_id' => 1,
            ]
        );

        $image3 = Image::create(
            [
                'url' => "https://cdn.dribbble.com/userupload/18758981/file/original-38422726569aa003002769ae8e6a95f2.jpg?format=webp&resize=320x240&vertical=center",
                'description' => "Foto de una casa minimalista",
                'user_id' => 1,
            ]
        );


        // Crear 2 tags
        $tag1 = ModelsTag::create(['name' => 'Minimalista']);
        $tag2 = ModelsTag::create(['name' => 'Website']);
        $tag3 = ModelsTag::create(['name' => 'Mobile']);

        $image1->tags()->attach([$tag1->id]);
        $image2->tags()->attach([$tag2->id]);
        $image3->tags()->attach([$tag3->id]);
    }
}
