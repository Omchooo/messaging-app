<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Posts extends Component
{

    public $amount = 6;
    public $state = 0;
    public $user;
    protected $listeners = ['newState'];

    public function loadMore()
    {
        $this->amount += 6;
    }

    public function newState($newState)
    {
        $this->state = $newState;
        $this->amount = 6;
    }

    // public function setAmount($newAmount)
    // {
    //     $this->amount = $newAmount;
    // }

    public function checkState($checkingState)
    {
        return ($this->state == $checkingState) ? true : false;
    }

    // public function mount($state)
    // {
    //     $this->state = $state;
    // }

    public function render()
    {
        if ($this->checkState(0)) {
            $posts = Post::latest()->with('media')->where('user_id', $this->user->id)->paginate($this->amount);

            return view('livewire.posts', compact('posts'));

        } elseif ($this->checkState(1)) {
            $likedPosts = Post::latest()->with('media')->with('likers')->paginate($this->amount);

            return view('livewire.posts', compact('likedPosts'));

        } else {
            $trashedPosts = Post::latest()->with('media')->onlyTrashed()->paginate($this->amount);

            return view('livewire.posts', compact('trashedPosts'));
        }


        // dump($this->user->id);
    }
}
