<?php

namespace Tests\Feature;

use Domain\Shared\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AccountTest extends TestCase
{
    private User $admin;

    private User $notApprovedUser;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--seed' => true]);
        $this->admin = User::all()->where('email', 'retmix@gmail.com')->first();
        $this->notApprovedUser = is_null(User::all()->where('active', false)->first()) ? User::create([
            'email' => 'java@gmail.com',
            'password' => Hash::make('password'),
            'active' => false
        ]) : User::all()->where('active', false)->first();
    }

    public function test_successful_authorize()
    {
        $response = $this->postJson('api/auth', ['email' => 'retmix@gmail.com', 'password' => 'password']
        )->assertStatus(Response::HTTP_OK)->assertJsonStructure(['token']);
    }

    public function test_successful_registration()
    {
        $registrationData = [
            'email' => 'registration@gmail.com',
            'password' => 'hardPassword'
        ];

        $this->postJson('api/registration', $registrationData)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'message',
                'createObject' => [
                    'id',
                    'email',
                    'active'
                ],
            ]);

        $this->assertDatabaseHas('users', ['email' => $registrationData['email'], 'active' => false]);
    }

    public function test_successful_activate_account()
    {
        $this->actingAs($this->admin)->postJson("api/users/{$this->notApprovedUser->id}/approve")
            ->assertOk()
            ->assertJsonStructure([
                'message',
                'updateObject' => [
                    'id',
                    'email',
                    'active',
                ]
            ]);
    }
}
