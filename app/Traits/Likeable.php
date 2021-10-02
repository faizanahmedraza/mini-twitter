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
            'select tweet_id, sum(liked) as likes, sum(!liked) as dislikes from likes group by tweet_id',
            'likes',
            'tweets.id',
            'likes.tweet_id'
        );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ],[
            'liked' => $liked
        ]);
    }

    public function dislike($user = null)
    {
        $this->like($user,false);
    }

    public function isLikedBy(User $user, $liked = true)
    {
        return (bool)$user->likes->where('tweet_id',$this->id)->where('liked',$liked)->count();
    }

    public function isDisLikedBy(User $user)
    {
        return (bool)$this->isLikedBy($user,false);
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'tweet_id','id');
    }
}