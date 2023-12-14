<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    /**
     *  @test 
     *  @group login
     */
    public function user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('#emailSignIn', $user->email)
                    ->type('#passwordSignIn', 'password')
                    ->click('.sign-in-container form > button')
                    ->assertPathIs('/')
                    ->assertSee('Login berhasil. Selamat datang, ' . $user->first_name);
            $browser->logout();
        });
    }

    /**
     *  @test 
     *  @group login
     */
    function user_cannot_login_with_invalid_email(): void
    {
        User::factory()->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('#emailSignIn', 'wrong@example.com')
                    ->type('#passwordSignIn', 'password')
                    ->click('.sign-in-container form > button')
                    ->assertPathIs('/login')
                    ->assertSee('Email tidak ditemukan.');
        });
    }

    /**
     *  @test 
     *  @group login
     */
    function user_cannot_login_with_invalid_password(): void
    {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('#emailSignIn', $user->email)
                    ->type('#passwordSignIn', 'wrongpassword')
                    ->click('.sign-in-container form > button')
                    ->assertPathIs('/login')
                    ->assertSee('Password yang Anda masukkan salah.');
        });
    }
}
