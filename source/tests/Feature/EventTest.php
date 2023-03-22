<?php

namespace Tests\Feature;

use Domain\Event\Models\Event;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class EventTest extends TestCase
{
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--seed' => true]);
        $this->admin = User::all()->where('email', 'retmix@gmail.com')->first();
    }

    public function test_index_event()
    {
        $this->actingAs($this->admin)->getJson('api/events')
            ->assertOk()
            ->assertJsonStructure([
                'objects' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'date',
                    ]
                ]
            ]);
    }

    public function test_retrieve_event()
    {
        $event = Event::all()->random();
        $this->actingAs($this->admin)->getJson("api/events/{$event->id}")
            ->assertOk()
            ->assertJsonStructure([
                'object' => [
                    'id',
                    'name',
                    'description',
                    'date'
                ]
            ]);
    }

    public function test_create_event()
    {
        $eventData = [
            'name' => 'Test',
            'description' => 'Description',
            'date' => '2023-12-12 07:30'
        ];

        $this->actingAs($this->admin)->postJson('api/events', $eventData)
            ->assertCreated()
            ->assertJsonStructure([
                'message',
                'createObject' => [
                    'id',
                    'name',
                    'description',
                    'date'
                ]
            ]);

        $this->assertDatabaseHas('global_events', [
            'name' => $eventData['name'],
            'description' => $eventData['description'],
        ]);
    }

    public function test_update_event()
    {
        $event = Event::all()->random();
        $updateData = ['name' => 'Change data'];

        $this->actingAs($this->admin)->patchJson("api/events/{$event->id}", $updateData)
            ->assertOk()
            ->assertJsonStructure([
                'message',
                'updateObject' => [
                    'id',
                    'name',
                    'description',
                    'date'
                ]
            ]);

        $this->assertDatabaseHas('global_events', [
            'id' => $event->id,
            'name' => $updateData['name']
        ]);
    }
}
