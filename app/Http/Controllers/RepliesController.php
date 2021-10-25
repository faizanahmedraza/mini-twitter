<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class RepliesController extends Controller
{
    public function store(Tweet $tweet)
    {
        request()->validate([
            'comment' => 'required|max:300',
            'image' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:100000'
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['body'] = request()->comment;
        if(request()->hasFile('image'))
        {
            $attributes['image'] = request()->file('image')->store('tweets/images');
        }
        $reply = Tweet::create($attributes);
        $tweet = Tweet::findOrFail($tweet->id);
        $tweet->reply($reply);
        return back()->with('success','You successfully replied to '.$tweet->user->name.'!');
    }
}
