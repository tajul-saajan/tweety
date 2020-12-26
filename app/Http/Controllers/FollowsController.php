<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class FollowsController extends Controller
{
    public function store(User $user) {
        //have the auth user follow given user
       auth()->user()->toggleFollow($user);


        return back();
    }
}
