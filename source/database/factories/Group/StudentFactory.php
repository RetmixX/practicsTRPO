<?php

namespace Database\Factories\Group;

use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'patronymic' => $this->faker->word(),
            'sex' => $this->faker->randomElement(['М', 'Ж']),
            'group_id' => Group::all()->isEmpty() ? Group::factory() : Group::all()->random()->id,
        ];
    }
}
