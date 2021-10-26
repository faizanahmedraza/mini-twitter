<?php


namespace App\Traits;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Builder;

trait Replyable
{
    public function scopeWithReplies(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, count(tweet_id) as comments from replies group by tweet_id',
            'replies',
            'tweets.id',
            'replies.tweet_id'
        );
    }

    public function replies()
    {
        return $this->belongsToMany(Tweet::class,'replies','tweet_id','replying_tweet_id')->withTimestamps();
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