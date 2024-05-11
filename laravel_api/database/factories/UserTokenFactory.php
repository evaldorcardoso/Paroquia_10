<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserToken>
 */
class UserTokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token' => md5(uniqid(rand(), true))
        ];
    }

    public function used()
    {
        return $this->state(function () {
            return [
                'used' => 1,
            ];
        });
    }

    public function expired()
    {
        return $this->state(function () {
            return [
                'created_at'=> now()->subHours(3)
            ];
        });
    }
}
