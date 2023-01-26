<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Modal extends Component
{
    public $amount = 3;
    public $post;
    public $state = 'hidden';

    public function loadMore()
    {
        $this->amount += 3;
    }

    public function setState()
    {
        if ($this->state == 'flex' || $this->state == '') {
            $this->state = 'hidden';
        } else {
            $this->state = 'flex';
        }
    }


    public function render()
    {
        // if ($this->state == 'fixed') {
        //     $comments = $this->post->comments->paginate($this->amount);

        //     return view('livewire.modal', compact('comments', 'modalState'));
        // }

        $comments = Comment::latest()
        // ->withCount('likers')
        ->where('post_id', $this->post->id)
        ->paginate($this->amount);
        // $comments = $this->post->comments->paginate($this->amount);

        // $freshPost = $this->post->fresh();
        // $this->setState();
        // $modalState = $this->state;
        $text = '';


        return view('livewire.modal', compact('comments', 'text'));
    }
}
