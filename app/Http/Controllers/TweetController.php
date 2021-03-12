<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class TweetController extends Controller
{
    public function store()
    {
        //persist the tweet
        $attributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('dashboard');
    }
}
