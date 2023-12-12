<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_be_created()
    {
        $userData = $this->userData();
        $response = $this->post('/register', $userData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }

    public function test_email_must_be_unique()
    {
        $user = User::factory()->create();
        $response = $this->post('/register', $this->userData([
            'email' => $user->email,
        ]));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');
    }

    public function test_password_is_hashed()
    {
        $userData = $this->userData();
        $this->post('/register', $userData);
        $user = User::where('email', $userData['email'])->first();
        $this->assertTrue(Hash::check($userData['password'], $user->password));
    }

    public function test_password_is_hidden_in_response()
    {
        $userData = $this->userData();
        $response = $this->post('/register', $userData);
        $response->assertStatus(201);
        $response->assertJsonMissing(['password']);
    }

    private function userData($overrides = [])
    {
        return array_merge([
            'first_name' => 'First',
            'last_name' => 'Last',
            'email' => 'first@example.com',
            'password' => 'secretpassword',
            'role' => 'user',
        ], $overrides);
    }
}