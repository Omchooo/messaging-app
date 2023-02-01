<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowModal extends Component
{
    public $amount = 3;
    public $post;

    public function loadMore()
    {
        $this->amount += 3;
    }



    public function render()
    {
        // if ($this->state == 'fixed') {
        //     $comments = $this->post->comments->paginate($this->amount);

        //     return view('livewire.modal', compact('comments', 'modalState'));
        // }

        // $comments = Comment::latest()
        // ->withCount('likers')
        // ->where('post_id', $this->post->id)
        // ->paginate($this->amount);
        $comments = $this->post->comments->paginate($this->amount);

        // $freshPost = $this->post->fresh();
        // $this->setState();
        // $modalState = $this->state;

        return view('livewire.show-modal', compact('comments'));
    }
}
