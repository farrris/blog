<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        $titles = ["Текст", "Цитата", "Картинка", "Видео", "Ссылка"];
        $icons = ["text", "quote", "photo", "video", "link"];

        for ($i = 0; $i < count($titles); $i++)
        {
            PostType::create([
                "title" => $titles[$i],
                "icon" => $icons[$i]
            ]);
        }

    }
}
