<?php

namespace Database\Factories\Shared;

use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->password()),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
