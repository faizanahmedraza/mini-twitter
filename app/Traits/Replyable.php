<?php


namespace App\Traits;

use App\Models\Reply;
use App\Models\Tweet;

trait Replyable
{
    public function replies()
    {
        return $this->belongsToMany(Reply::class,'replies','tweet_id','replying_tweet_id')->withTimestamps();
    }

    public function isReplied(Tweet $tweet)
    {
        return (bool)$this->replies()->where('replying_tweet_id',$tweet->id)->exists();
    }

    public function reply(Tweet $tweet)
    {
        $this->replies()->attach($tweet);
    }
}