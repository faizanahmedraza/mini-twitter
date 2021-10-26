<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = "replies";

    protected $fillable = [
        'tweet_id',
        'replying_tweet_id'
    ];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class,'tweet_id','id');
    }
}
