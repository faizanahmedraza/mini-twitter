<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index',[
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store(StoreTweetRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->id();
        if(request()->hasFile('image'))
        {
            $attributes['image'] = request()->file('image')->store('tweets/images');
        }
        Tweet::create($attributes);
        return redirect('/tweets')->with('success','Tweet submitted!');
    }

    public function show(Tweet $tweet)
    {
        $tweets = Tweet::with(['user','replies'])->withLikes()->withReplies()->get();
        $tweet = $tweets->find($tweet->id);
        $comments = $tweets->whereIn('id',$tweet->replies->pluck('id'))->all();
        return view('tweets.detail',compact('tweet','comments'));
    }
}
