<?php

namespace App\Models;

use App\Traits\Followable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'name',
        'avatar',
        'banner',
        'about',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/' . $value : '/images/default-avatar.png');
    }

    public function getBannerAttribute($value)
    {
        return asset($value ? 'storage/' . $value : '/images/default-banner.jpg');
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');
        return Tweet::with(['user', 'replies'])
            ->where('is_retweet', '=', 0)
            ->where('is_reply', '=', 0)
            ->whereIn('user_id', $friends)
            ->orWhere(function ($query) {
                $query->where('user_id', $this->id)
                    ->where('is_retweet', '=', 0)
                    ->where('is_reply', '=', 0);
            })
            ->withLikes()
            ->withReplies()
            ->latest()
            ->paginate(50);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'user_id', 'id')->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function replies()
    {
        return $this->hasManyThrough(Reply::class, Tweet::class,'user_id','replying_tweet_id','id','id');
    }

    public function profilePath($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
}
