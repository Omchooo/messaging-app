<?php

namespace App\Http\Livewire;

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

    public function mount($user, $buttonClasses = "btn-xs btn-outline text-xs")
    {
        $this->authUser = Auth::user();
        $this->followUser = $user;

        $this->isFollowing = $this->authUser->following->contains($this->followUser);

        $this->buttonClasses = $buttonClasses;
    }

    public function render()
    {
        return view('livewire.follow');
    }

    public function setFollow()
    {
        if ($this->authUser->following->contains($this->followUser)) {
            $this->removeFollow();
        } else {
            $this->addFollow();
        }

        $this->isFollowing = !$this->isFollowing;

        $this->emit('followStatusUpdated', $this->isFollowing, $this->followUser->id);
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
        if ($this->followUser->id == $userId) {
            $this->isFollowing = $isFollowing;
        }
    }

}
