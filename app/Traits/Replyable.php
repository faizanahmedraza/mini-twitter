<?php


namespace App\Traits;

use App\Models\Tweet;

trait Replyable
{
    public function replies()
    {
        return $this->belongsToMany(Tweet::class, 'replies', 'tweet_id', 'replying_tweet_id');
    }

    public function isReplied(Tweet $tweet)
    {
        return (bool)$this->replies()->where('replying_tweet_id',$tweet->id)->exists();
    }
}