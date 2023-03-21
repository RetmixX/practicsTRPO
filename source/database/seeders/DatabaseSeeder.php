<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Domain\Event\Models\Event;
use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email' => 'retmix@gmail.com', 'is_active' => true]);

        Group::factory(10)->create();
        Student::factory(50)->create();

        Event::factory(20)->create();
    }
}
