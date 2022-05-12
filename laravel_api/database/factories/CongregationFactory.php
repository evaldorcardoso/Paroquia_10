<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CongregationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'address' => $this->faker->address,
            'pastor' => $this->faker->name,
            'lat' => $this->faker->latitude,
            'lon' => $this->faker->longitude,
            'active' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(640, 480, 'cats'),
            'user_id' => User::factory()->create()->id
        ];
    }
}
