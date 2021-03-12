<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index() {
        $userAll = User::all();
//        dd($users);
        return view('explore',[
            'usersAll'=>$userAll
        ]);
    }
}
