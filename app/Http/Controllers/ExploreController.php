<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function __invoke()
    {
        return view('explore',[
            'tweets' => Tweet::with(['comments','user'])->withLikes()->latest()->paginate(50)
        ]);
    }
}
