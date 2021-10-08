<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->isLikedBy(current_user()) ? $tweet->like(current_user(),false) : $tweet->like(current_user());
        return response()->json();
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->isDisLikedBy(current_user()) ? $tweet->dislike(current_user(),false) : $tweet->dislike(current_user());
        return response()->json();
    }
}
