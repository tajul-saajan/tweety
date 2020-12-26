<?php


namespace App\Models;


trait Followable
{

    public function isFollowing(User $user)
    {
        return $this->follows()
            ->where('following_user_id',$user->id)
            ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class,
            'follows', 'user_id', 'following_user_id');
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unFollow(User $user) {

        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user) {
        if (auth()->user()->isFollowing($user))
        {
            return auth()->user()->unFollow($user);
        }

        return auth()->user()->follow($user);

    }
}
