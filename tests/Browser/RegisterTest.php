<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     *  @test 
     *  @group register
     */
    public function user_can_register_with_valid_payload(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->press('#signUp')
                    ->waitForText('Buat Akun')
                    ->type('#first_name', 'Depan')
                    ->type('#last_name', 'Belakang')
                    ->type('#emailSignUp', 'depanbelakang@example.com')
                    ->type('#passwordSignUp', 'qwertyui')
                    ->click('#registerButton')
                    ->assertPathIs('/')
                    ->assertSee('Pendaftaran berhasil. Selamat datang, Depan');
            $browser->logout();
        });
    }

    /**
     *  @test 
     *  @group register
     */
    function user_cannot_register_with_invalid_email(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->press('#signUp')
                    ->waitForText('Buat Akun')
                    ->type('#first_name', 'Depan')
                    ->type('#last_name', 'Belakang')
                    ->type('#emailSignUp', 'depanbelakangexample.com')
                    ->type('#passwordSignUp', 'qwertyui')
                    ->click('#registerButton')
                    ->assertPathIs('/login');
        });
    }

    /**
     *  @test 
     *  @group register
     */
    function user_cannot_register_with_an_email_that_already_exist(): void {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->press('#signUp')
                    ->waitForText('Buat Akun')
                    ->type('#first_name', 'Depan')
                    ->type('#last_name', 'Belakang')
                    ->type('#emailSignUp', $user->email)
                    ->type('#passwordSignUp', 'qwertyui')
                    ->click('#registerButton')
                    ->assertSee('The email has already been taken.');
        });
    }

    /**
     *  @test 
     *  @group register
     */
    function user_cannot_register_with_invalid_password(): void 
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->press('#signUp')
                    ->waitForText('Buat Akun')
                    ->type('#first_name', 'Depan')
                    ->type('#last_name', 'Belakang')
                    ->type('#emailSignUp', 'depanbelakang@example.com')
                    ->type('#passwordSignUp', 'qwerty')
                    ->click('#registerButton')
                    ->assertPathIs('/login');
        });
    }
}
