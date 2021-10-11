<?php

namespace App\Models;

use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'user_id',
        'body',
        'image'
    ];

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/'.$value) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'tweet_id','id');
    }
}
