<?php

namespace Database\Factories\Group;

use Domain\Group\Models\Group;
use Domain\Group\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'teacher_id' => Teacher::factory(),
        ];
    }
}
