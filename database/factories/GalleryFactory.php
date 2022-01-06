<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(20);
        return [
            'title' => $title,
            'slug' => Str::of($title)->slug(),
            'content' => $this->faker->realText(300),
        ];
    }
}
