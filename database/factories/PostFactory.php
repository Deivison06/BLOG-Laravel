<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $directory = public_path('images/posts');

        // Garante que o diretório exista
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Gera a imagem
        $thumb = $this->faker->image($directory, 640, 480, null, false);

        // Remove 'public/' do caminho da imagem
        $thumbPath = 'images/posts/' . $thumb;

        $title = $this->faker->sentence();
        return [
            'user_id' => User::pluck('id')->random(),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(),
            'thumb' => str_replace('public/', '', $thumb),
        ];
    }
}
