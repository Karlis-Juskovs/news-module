<?php

namespace Karlis\Module1\database\factories;

use Illuminate\Support\Str;
use Karlis\Module1\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => Str::limit($this->faker->sentence, 100),
            'content' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}