<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TweetCommentsController extends Controller
{
    public function store(Tweet $tweet)
    {
        $validator = Validator::make(request()->all(), [
            'comment' => 'required|max:300',
            'image' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:100000'
        ], [], [
            'comment' => 'body'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $attributes['user_id'] = auth()->id();
        $attributes['tweet_id'] = $tweet->id;
        $attributes['body'] = request()->comment;
        Comment::create($attributes);
        return redirect('/tweets')->with('success','You successfully commented on tweet.');
    }
}
