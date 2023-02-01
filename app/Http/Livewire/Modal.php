<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Modal extends Component
{
    public $post;
    // public $state = 'hidden';
    public $showComponent = false;

    public function showComponent()
    {
        if ($this->showComponent) {
            $this->showComponent = false;
        }
        else {
        $this->showComponent = true;
        }
    }

    // public function setState()
    // {
    //     if ($this->state == 'flex' || $this->state == '') {
    //         $this->state = 'hidden';
    //     } else {
    //         $this->state = 'flex';
    //     }
    // }

    public function render()
    {
        // $commentsCount = $this->post->comments->count();

        return view('livewire.modal', [
            'showComponent' => $this->showComponent,
            'commentsCount' => $this->post->comments()->count(),
        ]);
    }
}
