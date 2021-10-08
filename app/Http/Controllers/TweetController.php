<?php

namespace App\Http\Controllers;

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

    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:300',
            'image' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:100000'
        ]);
        $attributes['user_id'] = auth()->id();
        if(request()->hasFile('image'))
        {
            $attributes['image'] = request()->file('image')->store('tweets/images');
        }
        Tweet::create($attributes);
        return redirect('/tweets')->with('success','Tweet submitted!');
    }
}
