<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(7, 11),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->paragraphs(10, true),
            'category_id' => $this->faker->numberBetween(1, 5),
            'featured' => 'https://source.unsplash.com/random',
        ];
    }
}