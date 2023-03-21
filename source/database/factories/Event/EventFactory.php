<?php

namespace Database\Factories\Event;

use Domain\Event\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'date' => $this->faker->dateTime,
        ];
    }
}
