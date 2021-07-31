<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Carbon;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        # 1 post belong to 1 user
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        # 1 post has many comments
        return $this->hasMany(Comment::class);
    }

    public function readableDate($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
