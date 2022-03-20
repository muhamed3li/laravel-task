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
            'img'=>'images/0ac13f520d5e9872b24197871aac0fa9.png',
            'category_id' => $this->faker->numberBetween($min = 1, $max = 3),
        ];
    }
}
