<?php


namespace App\Traits;


use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) as likes, sum(disliked) as dislikes from likes group by tweet_id',
            'likes',
            'tweets.id',
            'likes.tweet_id'
        );
    }

    public function like($user = null, $liked = true, $disliked = false)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ],[
            'liked' => $liked,
            'disliked' => $disliked
        ]);
    }

    public function dislike($user = null,$disliked = true)
    {
        $this->like($user,false, $disliked);
    }

    public function isLikedBy(User $user, $liked = true)
    {
        return (bool)$user->likes->where('tweet_id',$this->id)->where('liked',$liked)->count();
    }

    public function isDisLikedBy(User $user, $disliked = true)
    {
        return (bool)$user->likes->where('tweet_id',$this->id)->where('disliked',$disliked)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'tweet_id','id');
    }
}