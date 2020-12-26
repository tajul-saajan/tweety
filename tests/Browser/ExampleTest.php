<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function testBasicExample()
    {


        $this->browse(function (Browser $browser) {
            $browser->visit('login')
                    ->type('email',"john@example.com")
                    ->type('password',"123123123")
                    ->press('Login')
                    ->pause(500)
                    ->assertPathIs('/dashboard')
                    ->clickLink("@profile_link")
                    ->assertPathIs('@profile_link') ;

        });
    }
}
