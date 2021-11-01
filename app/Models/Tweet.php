<?php

namespace App\Models;

use App\Traits\Likeable;
use App\Traits\Replyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory, Likeable, Replyable;

    protected $fillable = [
        'user_id',
        'body',
        'image',
        'is_retweet',
        'is_reply',
    ];


    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function retweets()
    {
        return $this->hasMany(Retweet::class,'tweet_id','id');
    }
}
