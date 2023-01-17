<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Posts extends Component
{

    public $amount = 6;

    public function loadMore()
    {
        $this->amount += 6;
    }

    public function render(User $user)
    {
        $posts = Post::latest()->where('user_id', auth()->user()->id)->paginate($this->amount);
        // dump(auth()->user()->id);
        return view('livewire.posts', compact('posts'));
    }

}
