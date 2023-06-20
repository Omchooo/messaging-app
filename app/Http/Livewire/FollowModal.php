<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowModal extends Component
{
    public $user;
    public $followData;
    public $followCount;
    public $followersCount;
    public $followingCount;
    public $showComponent = false;

    protected $listeners = ['followStatusUpdated'];

    public function mount()
    {
        $this->followersCount = $this->user->followers->count();
        $this->followingCount = $this->user->following->count();
        // dump($this->followersCount);
        // dump($this->followingCount);
    }

    public function render()
    {
        return view('livewire.follow-modal');
    }

    public function showComponent($followView = null)
    {
        if ($followView === 0) {
            // dump('followers');
            $this->followData = $this->user->followers;
            $this->followCount = $this->followersCount;
            // dump($this->followData);
        } else {
            // dump('following');
            $this->followData = $this->user->following;
            $this->followCount = $this->followingCount;
            // dump($this->followData);
        }

        $this->showComponent = !$this->showComponent;
    }

    public function followStatusUpdated()
    {
        $this->followersCount = $this->user->followers->count();
        $this->followingCount = $this->user->following->count();
    }
}
