<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LikeTweet extends Component
{
    public $isLiked = false;
    public $tweet;

    public function render()
    {
        return view('livewire.like-tweet');
    }

    public function likeTweet()
    {
        DB::table('likes')->updateOrInsert([
            'user_id'  => auth()->user()->id,
            'tweet_id' => $this->tweet->id,
            'liked'    => $this->toggle($this->isLiked),
        ]);
    }

    public function toggle($isLiked)
    {
        if ($isLiked == false) {
            $this->isLiked = true;
            return true;
        } else {
            $this->isLiked = false;
            return false;
        }
    }
}
