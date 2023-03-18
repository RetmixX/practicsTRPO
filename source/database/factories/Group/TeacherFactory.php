<?php

namespace Database\Factories\Group;

use Domain\Group\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'patronymic' => $this->faker->word(),
            'sex' => $this->faker->randomElement(['М', 'Ж']),
        ];
    }
}
