<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
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
            'price' => $this->faker->numberBetween(),
            'owner' => $this->faker->name(),
            'owner_contact' => $this->faker->phoneNumber(),
            'lat' => $this->faker->latitude(),
            'long' => $this->faker->longitude(),
            'is_business_product' => random_int(0, 1)
        ];
    }
}
