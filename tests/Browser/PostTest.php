<?php

namespace Tests\Browser;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostTest extends DuskTestCase
{
    /** @test  */
    public function a_user_can_log_in_correctly()
    {
        $f_names = DB::table('follows')->where('user_id',4)
            ->join('users','users.id','=', 'follows.following_user_id')
            ->pluck('name')->toArray();




        $this->browse(function (Browser $browser) use ($f_names)
        {
            $browser->visit('/login')
                ->type('email','saajan@saajan.com')
                ->type('password','12312312')
                ->click('button[type="submit"]');
            foreach ($f_names as $name)
            {
                $browser->assertSee($name);
            }
        });
    }

    /** @test  */
    public function create_a_tweet()
    {
        //first login
        $saajan =  User::get()->where('id',4)->first();

        $this->browse(function (Browser $browser) use ($saajan)
        {
            $browser->loginAs($saajan)
                ->visit('/login')
                ->assertPathIs('/dashboard')
                ->type('#tweet_box', 'testing to tweeet by hand')
                ->click("@post_tweet")
                ->assertSee('testing to tweeet by hand');
        });
    }

}
