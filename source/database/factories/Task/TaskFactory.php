<?php

namespace Database\Factories\Task;

use Domain\Group\Models\Group;
use Domain\Task\Enums\StatusTask;
use Domain\Task\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'status'=> $this->faker->randomElement(StatusTask::cases()),
            'date' => $this->faker->dateTime,
            'group_id' => Group::all()->isEmpty() ? Group::factory() : Group::all()->random()->id,
        ];
    }
}
