<?php

namespace App\Http\Livewire;

use App\Enums\NotificationType;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Follow extends Component
{
    // public $post;
    public $followUser;
    public $authUser;
    public $isFollowing = false;
    public $buttonClasses;

    protected $listeners = ['followStatusUpdated'];

    public function mount($user, $authUser = null, $buttonClasses = "btn-xs btn-outline text-xs")
    {
        $this->authUser = $authUser ?? Auth::user();
        $this->followUser = $user;

        $this->isFollowing = $this->authUser->following->contains($this->followUser);

        $this->buttonClasses = $buttonClasses;
    }

    public function render()
    {
        // dump($this->authUser->following->count());
        return view('livewire.follow');
    }

    public function setFollow()
    {
            $notification = Notification::where('from_user', $this->authUser->id)
                ->where('type', NotificationType::Follow)
                ->first();
                // dump($notification);
            // dd($this->hasLiked);
            if (!$notification && $this->isFollowing && $this->authUser->id != $this->followUser->id) {
                // dump('wow');

                Notification::create([
                    'from_user' => $this->authUser->id,
                    'to_user' => $this->followUser->id ?? $this->followUser,
                    'type' => NotificationType::Follow,
                ]);
            }

            if (!$this->isFollowing && $this->authUser->id != $this->followUser->id) {
                $notification->touch();
            }

        if ($this->authUser->following->contains($this->followUser)) {
            $this->removeFollow();
        } else {
            $this->addFollow();
        }

        $this->isFollowing = !$this->isFollowing;

        $this->emit('followStatusUpdated', $this->isFollowing, $this->followUser->id ?? $this->followUser);
    }

    public function addFollow()
    {
        $this->authUser->following()->attach($this->followUser);
    }

    public function removeFollow()
    {
        $this->authUser->following()->detach($this->followUser);
    }

    public function followStatusUpdated($isFollowing, $userId)
    {
        if ($this->followUser->id ?? $this->followUser == $userId) {
            $this->isFollowing = $isFollowing;
        }
    }

}
