<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $amount = 7;
    public $post;

    public function render()
    {
        $comments = $this->post->comments->paginate($this->amount);
        // dump($comments);

        return view('livewire.comments', compact('comments'));
    }

    public function loadMore()
    {
        $this->amount += 5;
    }

}
