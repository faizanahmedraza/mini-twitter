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

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/'.$value) : null;
    }
}
