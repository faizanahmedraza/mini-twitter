<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(20)
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => [
              'string','required','max:255','alpha_dash',Rule::unique('users','username')->ignore($user)
            ],
            'name' => [
                'string', 'required', 'max:255', 'alpha'
            ],
            'email' => [
                'string','required','max:255', Rule::unique('users','email')->ignore($user)
            ],
            'avatar' => [
                'sometimes','nullable','file'
            ],
            'password' => [
                'sometimes','nullable','string','min:8','max:255','confirmed'
            ],
            'password_confirmation' => [
                'sometimes','nullable','string','min:8','max:255'
            ],
            'about' => [
                'sometimes','nullable','string','max:300'
            ]
        ]);

        if(request()->avatar)
        {
            $attributes['avatar'] = request()->file('avatar')->store('avatars');
        }
        $user->update($attributes);
        return redirect($user->profilePath());
    }
}
