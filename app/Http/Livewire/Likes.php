<?php

namespace App\Http\Livewire;

use App\Enums\NotificationType;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Likes extends Component
{
    public $likeColor;
    public $post;
    public $comment;
    public $type;
    public $authUser;
    public $hasLiked;

    public function mount()
    {
        $this->authUser = Auth::user();
    }

    public function getType()
    {
        if ($this->post) {
            $this->type = $this->post;
        } else {
            $this->type = $this->comment;
        }
    }

    public function getColor()
    {
        $this->getType();
        if ($this->authUser->hasLiked($this->type)) {
            $this->hasLiked = true;
            return '#ed4956';
        } else {
            $this->hasLiked = false;
            return '#8e8e8e';
        }
    }

    public function setLike()
    {
        $this->getType();

        if ($this->post) {
            $notification = Notification::where('post_id', $this->post->id)
                ->where('from_user', $this->authUser->id)
                ->where('type', NotificationType::Like)
                ->first();
                // dump($notification);
            // dd($this->hasLiked);
            if (!$notification && $this->authUser->id != $this->post->user->id) {
                // dump('wow');

                Notification::create([
                    'from_user' => $this->authUser->id,
                    'to_user' => $this->post->user->id,
                    'type' => NotificationType::Like,
                    'post_id' => $this->post->id,
                ]);
            }

            // dd($notification);

            if (!$this->hasLiked && $this->authUser->id != $this->post->user->id) {
                $notification->touch();
            }
        }
        // $this->getColor();
        // return $this->authUser->toggleLike($this->type);
        return $this->authUser->toggleLike($this->type);
    }

    public function getLikes()
    {
        $this->getType();
        // $likesCount = $this->type->likers_count;
        // dump($this->type);
        // dump($likesCount);
        // return $this->type->fresh()->likers()->count();
        return $this->type->fresh()->likers()->count();
    }

    public function render()
    {
        $this->getType();
        $color = $this->getColor();
        $likes = $this->getLikes();

        return view('livewire.likes', compact('color', 'likes'));
    }
}
