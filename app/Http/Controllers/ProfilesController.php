<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use function redirect;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('show_profile', compact('user'));
    }

    public function edit(User $user)
    {

//        $this->authorize('edit',$user);

        return view('profile_edit', compact('user'));
    }

    public function update(User $user)
    {

        $attributes = request()->validate([
            'username' =>
                ['string', 'required', 'max:255', 'alpha_dash',
                    Rule::unique('users')->ignore($user)],

            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],

            'email' =>
                ['string', 'required', 'max:255', 'email',
                    Rule::unique('users')->ignore($user)],

            'password' => ['string', 'required', 'max:255', 'min:8', 'max:255','password', 'confirmed']
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $attributes['avatar'] = request('avatar')->store('avatars');

        $user->update($attributes);

        return redirect($user->path());
    }
}
