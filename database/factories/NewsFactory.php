<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gambar' => 'http://images.unsplash.com/photo-1619918456538-df5b5290950b?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZGVzYXxlbnwwfHwwfHx8MA%3D%3D',
            'judul' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'deskripsi' => $this->faker->paragraph(),
            'views' => $this->faker->numberBetween(1, 100),
            'user_id' => 1,
        ];
    }
}
