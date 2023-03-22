<?php

namespace Tests\Feature;

use Domain\Group\Models\Teacher;
use Domain\Shared\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TeacherTest extends TestCase
{
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--seed' => true]);
        $this->admin = User::all()->where('email', 'retmix@gmail.com')->first();
    }

    public function test_retrieve_teacher()
    {
        $teacher = Teacher::all()->random();
        $this->actingAs($this->admin)->getJson("api/teachers/{$teacher->id}")
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

    public function test_index_teacher()
    {
        $this->actingAs($this->admin)->getJson("api/teachers")
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

    public function test_store_teacher()
    {
        $teacher = [
            'name' => 'Test',
            'surname' => 'Test',
            'patronymic' => 'Test',
            'sex' => 'М'
        ];

        $this->actingAs($this->admin)->postJson('api/teachers', $teacher)
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

        $this->assertDatabaseHas('teachers', $teacher);
    }
}
