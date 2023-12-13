<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_be_created(): void
    {
        $userData = $this->userData();
        $response = $this->post('/register', $userData);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }

    public function test_email_must_be_unique(): void
    {
        $user = User::factory()->create();
        $response = $this->post('/register', $this->userData([
            'email' => $user->email,
        ]));
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    public function test_password_is_hashed(): void
    {
        $userData = $this->userData();
        $this->post('/register', $userData);
        $user = User::where('email', $userData['email'])->first();
        $this->assertTrue(Hash::check($userData['password'], $user->password));
    }

    public function test_password_is_hidden(): void
    {
        $userData = $this->userData();
        $this->post('/register', $userData);
        $user = User::where('email', $userData['email'])->first();
        $this->assertArrayNotHasKey('password', $user->toArray());
        $this->assertJsonStringNotEqualsJsonString(json_encode(['password' => $user->password]), $user->toJson());
    }

    public function test_user_logout(): void
    {
        $userData = $this->userData();
        $this->post('/register', $userData);
        $response = $this->post('/logout');
        $this->assertEquals(session('success'), 'Logout berhasil');
        $this->assertFalse((Auth::check()));
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_user_login_with_incorrect_password(): void
    {
        $userData = $this->userData();
        $this->post('/register', $userData);
        $this->post('/logout');
        $response = $this->post('/login', [
            'email' => $userData['email'],
            'password' => 'invalid',
        ]);
        $response->assertSessionHasErrors([
            'password' => 'Password yang Anda masukkan salah.',
        ]);
    }

    public function test_user_login_with_incorrect_email(): void
    {
        $userData = $this->userData();
        $this->post('/register', $userData);
        $this->post('/logout');
        $response = $this->post('/login', [
            'email' => 'invalid@example.com',
            'password' => $userData['password'],
        ]);
        $response->assertSessionHasErrors([
            'email' => 'Email tidak ditemukan.',
        ]);
    }

    public function test_user_login_with_correct_credentials(): void
    {
        $userData = $this->userData();
        $this->post('/register', $userData);
        $this->post('/logout');
        $response = $this->post('/login', [
            'email' => $userData['email'],
            'password' => $userData['password'],
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Login berhasil. Selamat datang, ' . $userData['first_name']);
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
