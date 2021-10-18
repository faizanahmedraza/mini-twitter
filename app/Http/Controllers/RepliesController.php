<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;
use App\Models\Tweet;

class RepliesController extends Controller
{
    public function store(StoreTweetRequest $request,Tweet $tweet)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->id();
        if(request()->hasFile('image'))
        {
            $attributes['image'] = request()->file('image')->store('tweets/images');
        }
        $reply = Tweet::create($attributes);
        $tweet = Tweet::findOrFail($tweet);
        $tweet->replies()->save($reply);
        return back()->with('success','You successfully replied to '.$tweet->user->name.'!');
    }
}
