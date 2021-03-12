<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    /** @test  */
//    use DatabaseMigrations;

    public function a_user_can_register_correctly()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/register')
                ->type('name','TestUser')
                ->type('email','testuser@test.com')
                ->type('password','password')
                ->type('password_confirmation','password')
                ->click('button[type="submit"]')
                ->assertPathIs('/login');
        });

    }

    /** @test  */
    public function a_user_can_log_in_correctly()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/login')
                    ->type('email','saajan@saajan.com')
                    ->type('password','12312312')
                    ->click('button[type="submit"]')
                    ->assertSee('Mrs. Gina Veum');
        });
    }
}
