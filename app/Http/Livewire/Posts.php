<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Posts extends Component
{

    public $amount = 6;

    public $user;

    public function loadMore()
    {
        $this->amount += 6;
    }

    public function render()
    {
        $posts = Post::latest()->where('user_id', $this->user->id)->paginate($this->amount);
        // dump($this->user->id);
        return view('livewire.posts', compact('posts'));
    }

}
