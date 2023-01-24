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
        $this->amount += 6;
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
        $comments = $this->post->comments->paginate($this->amount);
        // $comments = Comment::latest()->where('post_id', $this->post->id)->paginate(6);
        // $freshPost = $this->post->fresh();
        // $this->setState();
        $modalState = $this->state;

        return view('livewire.modal', compact('comments', 'modalState'));
    }
}
