<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->name(),
            "description" => $this->faker->text(),
            "thumbnail" => $this->faker->image("public/storage/products", 640, 520, null, false),
            "price" => $this->faker->randomDigit(),
        ];
    }
}
