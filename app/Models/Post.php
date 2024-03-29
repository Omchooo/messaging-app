<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\Image\Manipulations;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, Likeable;

    protected $fillable = [
        'desc',
        'user_id',
    ];

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

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('responsive')
            ->performOnCollections('post')
            ->withResponsiveImages()
            // ->crop(Manipulations::CROP_CENTER, 50, 50)
            ->nonQueued();
    }
}
