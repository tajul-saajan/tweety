<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Events\TweetUpdateEvent;

class TweetController extends Controller
{
    public function store()
    {
        //persist the tweet
        $attributes = request()->validate(['body' => 'required|max:255']);
        $tweet=Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        event(new TweetUpdateEvent($tweet));

        return redirect('dashboard');
    }
}
