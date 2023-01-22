<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Likeable;

    protected $fillable = [
        'desc',
        'user_id',
    ];
//create like system for liking and unliking a post in laravel
    // public function toggleLike($id)
    // {
    //     $post = Post::find($id);
    //     auth()->user()->toggleLike($post);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
