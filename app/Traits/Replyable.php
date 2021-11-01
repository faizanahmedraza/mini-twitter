<?php


namespace App\Traits;

use App\Models\Tweet;
use App\Models\User;
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

    public function onlyReplyTweets()
    {
        return current_user()->tweets->where('is_reply',1);
    }

    public function isRepliedBy(User $user)
    {
        return (bool)Tweet::where('user_id',$user->id)->with(['replies'=>function($q){
            $q->where('replying_tweet_id',$this->id);
        }])->exists();
    }

    public function reply(Tweet $tweet)
    {
        $this->replies()->attach($tweet);
    }

    public function replies()
    {
        return $this->belongsToMany(Tweet::class,'replies','tweet_id','replying_tweet_id')->withTimestamps();
    }
}