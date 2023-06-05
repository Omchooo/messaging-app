<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowModal extends Component
{
    public $post;

    public function render()
    {
        // if ($this->state == 'fixed') {
        //     $comments = $this->post->comments->paginate($this->amount);

        //     return view('livewire.modal', compact('comments', 'modalState'));
        // }

        $hasComments = $this->post->comments->count();
        $user = $this->post->user->load('following');

        return view('livewire.show-modal', compact('hasComments', 'user'));
    }



}
