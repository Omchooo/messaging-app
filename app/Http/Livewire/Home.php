<?php

namespace App\Http\Livewire;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $posts;
    public $amount = 5;
    public $postsCount = 0;

    function mount() {
        $this->loadMore();
        $this->amount = 2;

    }

    public function loadMore()
    {
        $morePosts = Post::latest()
            ->with(['user.following', 'media'])
            ->skip($this->postsCount)
            ->take($this->amount)
            ->get();
            // dump($morePosts);

        $this->posts = $this->posts ? $this->posts->merge($morePosts) : $morePosts;
        $this->postsCount += $this->amount;

    }

    public function render()
    {
        return view('livewire.home');
    }



    // public $amount = 6;

    // public function render()
    // {
    //     $posts = Post::latest()
    //         ->with('user.following')
    //         ->with('media')
    //         // ->withCount('comments')
    //         // ->with('likers')
    //         ->paginate($this->amount);

    //     return view('livewire.home', compact('posts'));
    // }

    // public function loadMore()
    // {
    //     $this->amount += 2;
    // }
}
