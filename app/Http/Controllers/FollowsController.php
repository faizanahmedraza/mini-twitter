<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        current_user()->toggleFollow($user);
        $follow = (bool)current_user()->following($user) ? 'un following' : 'following';
        return back()->with('success','Now you '.$follow.' '.$user->name.'!');
    }
}
