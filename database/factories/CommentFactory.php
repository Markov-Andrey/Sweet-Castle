<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,100),
            'commentable_id' => rand(1,15),
            'commentable_type' => 'App\Models\Product',
            'text' => $this->faker->text(),
        ];
    }
}
