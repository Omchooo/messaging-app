<?php

namespace App\Http\Livewire;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $amount = 6;

    public function render()
    {
        $posts = Post::latest()
            // ->with('user')
            // ->with('media')
            // ->withCount('comments')
            // ->with('likers')
            ->paginate($this->amount);


        return view('livewire.home', compact('posts'));
    }

    public function loadMore()
    {
        $this->amount += 6;
    }



}
