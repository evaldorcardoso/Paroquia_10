<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'event_at' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'address' => $this->faker->address,
            'description' => $this->faker->text,
            'readings' => $this->faker->sentence,
            'congregation_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
