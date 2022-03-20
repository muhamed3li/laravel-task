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
            'name'=>$this->faker->text(30),
            'description'=>$this->faker->text(300),
            'img'=>$this->faker->image('public/storage/images'.'/images/',640,480, null, false),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 3),
        ];
    }
}
