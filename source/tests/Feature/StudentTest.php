<?php

namespace Tests\Feature;

use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class StudentTest extends TestCase
{
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--seed' => true]);
        $this->admin = User::all()->where('email', 'retmix@gmail.com')->first();
    }

    public function test_retrieve_student()
    {
        $student = Student::all()->random();
        $this->actingAs($this->admin)->getJson("api/students/{$student->id}")
            ->assertOk()
            ->assertJsonStructure([
                'object' => [
                    'id',
                    'name',
                    'surname',
                    'patronymic',
                    'sex',
                ]
            ]);
    }

    public function test_index_student()
    {
        $this->actingAs($this->admin)->getJson("api/students")
            ->assertOk()
            ->assertJsonStructure([
                'objects' => [
                    '*' => [
                        'id',
                        'name',
                        'surname',
                        'patronymic',
                        'sex',
                    ]
                ]
            ]);
    }

    public function test_store_student()
    {
        $student = [
            'name' => 'Test',
            'surname' => 'Test',
            'patronymic' => 'Test',
            'sex' => 'М'
        ];

        $this->actingAs($this->admin)->postJson('api/students', $student)
            ->assertCreated()
            ->assertJsonStructure([
                'message',
                'createObject' => [
                    'id',
                    'name',
                    'surname',
                    'patronymic',
                    'sex'
                ]
            ]);

        $this->assertDatabaseHas('students', $student);
    }


}
