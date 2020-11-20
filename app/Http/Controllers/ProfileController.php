<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function show(User $user) {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user) {
        if ($user->isNot(current_user())) {
            abort(403);
        }
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user)
            ],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['required', 'file'],
            'bio' => ['string', 'max:255'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user)
            ],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);
        $attributes['avatar'] = request('avatar')->store('avatars');
        $user->update($attributes);
        return redirect($user->path());
    }

}
