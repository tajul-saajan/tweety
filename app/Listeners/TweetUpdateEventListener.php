<?php

namespace App\Listeners;

use App\Events\TweetUpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TweetUpdateEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TweetUpdateEvent  $event
     * @return void
     */
    public function handle(TweetUpdateEvent $event)
    {
        $tweet = $event->tweet;
        DB::table('tweet_update_time')->insert([
            'tweet_id' => $tweet->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
