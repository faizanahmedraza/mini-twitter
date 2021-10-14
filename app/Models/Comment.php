<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tweet_id',
        'body',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class,'tweet_id','id');
    }
}
